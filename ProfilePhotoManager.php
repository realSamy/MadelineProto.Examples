<?php

/**
 * Profile Photo Manager v1.0 Async
 *
 * @author realSamy <https://t.me/realSamy>
 * @author MadelineProto Farsi <https://t.me/Madeline_Farsi>
 *
 * Feel free to use and share this file by joining our channel
 */

/**
 * Used classes
 *
 * @since 1.0
 */
use danog\MadelineProto\API;
use danog\MadelineProto\EventHandler;
use danog\MadelineProto\Loop\Generic\GenericLoop;
use danog\MadelineProto\RPCErrorException;

/**
 * Installing MadelineProto Library
 *
 * @since 1.0
 */
if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';

/**
 * MadelineProto Settings
 *
 * @since 1.0
 */
$settings = [
    'logger' => [
        'logger_level' => 5
    ],
    'serialization' => [
        'serialization_interval' => 30,
        'cleanup_before_serialization' => true,
    ],
    'app_info' => [
        'api_id' => 839407,
        'api_hash' => '0a310f9d03f51e8aa00d9262ef55d62e',
    ]
];

/**
 * Creating New API
 *
 * @since 1.0
 */
$MadelineProto = new API('MadeByRealSamy', $settings);

/**
 * Saves bot database to data/data.json
 *
 * @param array $data - Bot database
 * @return bool - true on success
 *
 * @since 1.0
 */
function saveData($data): bool
{
    return file_put_contents('./data/data.json', json_encode($data, 128|256));
}

/**
 *Creating needed files
 *
 *@since 1.0
 */
if (!file_exists('./data/data.json')) {
    if (!file_exists('./data')) {
        mkdir('./data');
    }
    $data['profile']['started'] = false;
    $data['profile']['set'] = false;
    $data['restart'] = false;
    saveData($data);
}

/**
 * Bot database array
 *
 * @since 1.0
 */
$data = json_decode(file_get_contents("./data/data.json"), true);

/**
 * Event handler class.
 */
class profileManager extends EventHandler
{
    /**
     * Handle updates from super groups and channels
     *
     * @param array $update Update
     * @return Generator
     *
     * @since 1.0
     */
    final public function onUpdateNewChannelMessage(array $update): Generator
    {
        return $this->onUpdateNewMessage($update);
    }

    final public function onUpdateNewMessage(array $update): Generator
    {
        if (isset($update['message']['out']) && $update['message']['out']) {
            if (isset($update['message']['message'])) {
                try {
                    $msg = $update['message']['message'];
                    $peer = $update['message']['to_id'];
                    $msg_id = $update['message']['id'];
                    $data = json_decode(file_get_contents("./data/data.json"), true);
                    if (preg_match('/^setprofile (on|off)$/i', $msg, $mch)) {
                        if (preg_match('/on/i', $mch[1])) {
                            if ($data['profile']['started'] == false) {
                                $data['profile']['started'] = true;
                                $data['profile']['set'] = false;
                                saveData($data);
                                $text = "عملیات ساخت پروفایل با موفقیت فعال شد.";
                            } else {
                                $text = "عملیات ساخت پروفایل از قبل در حال انجام است.";
                            }
                        } else {
                            if ($data['profile']['started'] == true) {
                                $data['profile']['started'] = false;
                                saveData($data);
                                $text = "عملیات ساخت پروفایل با موفقیت غیرفعال شد.";
                            } else {
                                $text = "عملیات ساخت پروفایل از قبل غیرفعال است.";
                            }
                        }
                        yield$this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => $text]);
                    }
                    if (preg_match('/^delprofile ([0-9]{1,3})$/i', $msg, $mch)) {
                        $tdd = $mch[1];
                        $photos = yield$this->photos->getUserPhotos(['user_id' => 'me', 'offset' => 0, 'max_id' => 0, 'limit' => $tdd,]);
                        $a = yield$this->photos->deletePhotos(['id' => $photos['photos'],]);
                        $cc = count($a);
                        yield$this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "$cc عکس پروفایل حذف شد!"]);
                    }
                    if (preg_match('/^toprofile$/i', $msg, $mch)) {
                        if (isset($update['message']['reply_to_msg_id'])) {
                            $rp = $update['message']['reply_to_msg_id'];
                            $Chat = yield$this->getPwrChat($peer, false);
                            $type = $Chat['type'];
                            if (in_array($type, ['channel', 'supergroup'])) {
                                $messeg = yield$this->channels->getMessages(['channel' => $peer, 'id' => [$rp],]);
                            } else {
                                $messeg = yield$this->messages->getMessages(['id' => [$rp],]);
                            }
                            if (isset($messeg['messages'][0]['media']['photo'])) {
                                $media = $messeg['messages'][0]['media'];
                                yield$this->photos->uploadProfilePhoto(['file' => $media,]);
                                $text = "پروفایل با موفقیت آپلود شد!";
                            } else {
                                $text = "این دستور باید در ریپلای یک عکس استفاده شود!";
                            }

                        } else {
                            $text = "این دستور باید در ریپلای یک عکس استفاده شود!";
                        }
                        yield$this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => $text]);
                    }
                    if (preg_match('/^getprofile+[ ]?+([0-9]{0,2})$/i', $msg, $mch)) {
                        if (isset($update['message']['reply_to_msg_id'])) {
                            $lim = ($mch[1] !== "") ? $mch[1] : 1;
                            $rp = $update['message']['reply_to_msg_id'];
                            $Chat = yield$this->getPwrChat($peer, false);
                            $type = $Chat['type'];
                            if (in_array($type, ['channel', 'supergroup'])) {
                                $messeg = yield$this->channels->getMessages(['channel' => $peer, 'id' => [$rp],]);
                            } else {
                                $messeg = yield$this->messages->getMessages(['id' => [$rp],]);
                            }
                            $name = $messeg['users'][0]['first_name'];
                            $un = $messeg['users'][0]['id'];
                            $user = "[$name](mention:$un)";
                            if (isset($messeg['users'][0]['photo'])) {
                                $photo = yield$this->photos->getUserPhotos(['user_id' => $un, 'offset' => 0, 'max_id' => 0, 'limit' => $lim,]);
                                $cc = count($photo['photos']);
                                foreach ($photo['photos'] as $key => $photo) {
                                    yield$this->downloadToFile($photo, './file.jpg');
                                    $a = yield$this->photos->uploadProfilePhoto(['file' => './file.jpg',]);
                                    if (isset($a)) {
                                        unlink('./file.jpg');
                                    }
                                }
                                $text = "$cc از پروفایل های کاربر $user با موفقیت کپی شد!";
                            } else {
                                $text = "پروفایل  $user خالی یا مخفی است!";
                            }
                        } else {
                            $text = "این دستور باید در ریپلای کاربری که پروفایل داشته باشد ارسال شود!";
                        }
                        yield$this->messages->sendMessage(['peer' => $peer, 'parse_mode' => 'Markdown', 'id' => $msg_id, 'message' => $text]);
                    }
                    if (preg_match('/^(help|realSamy|راهنما)$/i', $msg, $mch)) {
                        $text = "[realSamy](mention:@realSamy) **Profile Manager Bot**


📍🔸
📍 **Delete Profile Photos** 
📍`delProfile number`
🔸
📍 **Clock On Profile Photo** 
📍 `setProfile on/off`
🔸
📍 **Copy A User Profiles On Your Profile** 
📍`getProfile number`
📍 __This Command Must Be Used On Reply__
🔸
📍 **Put A Sent Photo On Your Profile** 
📍 `toProfile`
📍__This Command Must Be Used On Reply__
🔸
📍 **Restarting The Bot** 
📍 `restart`
📍 __Use Command 1 Then 2 In Any Chats__
🔸
📍 **Get This Help Message** 
📍 `realSamy`/`help`/`راهنما`
📍🔸

**Contact Support:** [realSamy](mention:@realSamy)";
                        yield$this->messages->editMessage(['peer' => $peer, 'parse_mode' => 'Markdown', 'id' => $msg_id, 'message' => $text]);
                    }
                    if (preg_match('/^restart$/i', $msg)) {
                            yield$this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Restarted!']);
                            die('Restarted Manualy');
                    }
                } catch (Exception $e) {
                    yield$this->messages->sendMessage(['peer' => 'me', 'message' => json_encode($e, JSON_PRETTY_PRINT)]);
                    $this->logger($e);
                }
            }
        }
        if (file_exists('./re')) {
            unlink('./re');
            die('Restarted in file manager');
        }
    }
}

/**
 * A loop to set profile photo every 30 seconds!
 *
 * @param danog\MadelineProto\API $MadelineProto
 * @param callable $callback
 * @param string $name
 *
 * @since 1.0
 */
$loop = new GenericLoop($MadelineProto, function () {
    try {
        $data = json_decode(file_get_contents("./data/data.json"), true);
        if (isset($data['profile']['started']) and $data['profile']['started'] == true) {
            if (isset($data['profile']['set']) && $data['profile']['set'] == true) {
                $photos = yield$this->API->photos->getUserPhotos(['user_id' => 'me', 'offset' => 0, 'max_id' => 0, 'limit' => 1,]);
                $deleted = yield$this->API->photos->deletePhotos(['id' => $photos['photos'],]);
                if (isset($deleted)) {
                    $data['profile']['set'] = false;
                    saveData($data);
                }
            }
            if (isset($data['profile']['set']) && $data['profile']['set'] == false) {
                if (!file_exists('./pf.png')) {
                    copy('https://intrests.altervista.org/wp-content/uploads/api/img/clock.php', './pf.png');
                }
                yield$this->API->photos->uploadProfilePhoto(['file' => './pf.png',]);
                $data['profile']['set'] = true;
                saveData($data);
                unlink('./pf.png');
            }
        }
        if (file_exists('./re')) {
            unlink('./re');
            die('Restarted in file manager');
        }
    } catch (Exception $e) {
        $this->API->logger($e);
    }


    return 30;
}
    , "Clock Profile");

$loop->start();

/**
 * MadelineProto main loop
 *
 * @param string Event Handler name
 */
$MadelineProto->startAndLoop(profileManager::class);
