<?php /** @noinspection ALL */


/**
 * Tabchi v1.0.0 Async
 *
 * @author realSamy <https://t.me/realSamy>
 * @author Madeline Farsi <https://t.me/Madeline_Farsi>
 *
 * Join our channel and feel free to use this file!
 */

##-----------------Functions------------------##
function savedata($data)
{
    file_put_contents('./data/data.json', json_encode($data, 128|256));
}

function saveword($word)
{
    file_put_contents('./data/word.json', json_encode($word, 128|256));
}

##-----------------Functions------------------##


##------------------DataBase------------------##
if (!file_exists('./data/')) {
    mkdir('./data');
}
if (!file_exists('./data/data.json')) {
    $file = fopen('./data/data.json', 'w');
    fclose($file);
    $data["data"]["state"] = "آنلاین✅";
    $data["data"]["Typing"] = "خاموش❌";
    $data["data"]["ANS_PV"] = "خاموش❌";
    $data["data"]["Join"] = "خاموش❌";
    $data["data"]["Save"] = "خاموش❌";
    $data["data"]["JoinSave"] = "خاموش❌";
    $data["data"]["ANS_GP"] = "خاموش❌";
    $data["data"]["Read"] = "خاموش❌";
    savedata($data);
}
if (!file_exists('./data/word.json')) {
    $file = fopen('./data/word.json', 'w');
    fclose($file);
    $word["on"] = "on";
    saveword($word);
}
##------------------DataBase------------------##

##---------------Madeline Install-------------##
if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';
use danog\MadelineProto\API;
use danog\MadelineProto\EventHandler;
use danog\MadelineProto\RPCErrorException;
##---------------Madeline Install-------------##


##------------------Variables-----------------##
$template = '<html><head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" /><title>Tabchi - Login</title><link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"><style>body {color: aliceblue;background: darkgray; background: url("https://cdn.bestbadboy.ir/images/bg1.png") fixed center; background-size: cover;}div.main,footer {background: url("https://cdn.bestbadboy.ir/images/bg1_blured.png") fixed center;background-size: cover;}</style></head><body><div class="container-fluid"><div class="row"><div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12" style="padding: 0"><div class="main" style="padding: 10px; margin-top: 100px; box-shadow: 0 0 5px 1px black; border: aliceblue 1px; border-radius: 5px"><div class="blur"></div><h3 class="text-center">Tabchi V1.0.0 Login </h3><hr><br><form method="post" style="text-align: center">%s<br><button class="btn btn-info btn-block btn-sm" type="submit">Go</button></form><h4 class="text-center">%s </h4></div></div></div></div><footer style="position: fixed; bottom: 0; width: 100vw"><h5 class="text-center">This File Was Shared On MadelineProto Farsi Channel <a class="btn btn-success btn-sm" role="button" href="https://t.me/MadelineProto_farsi" target="_blank">Join Us</a></h5></footer><script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script><script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script><script>$(document).ready(function() {$("select").addClass("form-control");$("input").addClass("form-control");$("img").hide();})</script></body></html>';
$APITemplate = '<html><head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" /><title>Tabchi - Login</title><link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"><style>body {color: aliceblue;background: darkgray; background: url("https://cdn.bestbadboy.ir/images/bg1.png") fixed center; background-size: cover;}div.main,footer {background: url("https://cdn.bestbadboy.ir/images/bg1_blured.png") fixed center;background-size: cover;}</style></head><body><div class="container-fluid"><div class="row"><div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12" style="padding: 0"><div class="main" style="padding: 10px; margin-top: 100px; box-shadow: 0 0 5px 1px black; border: aliceblue 1px; border-radius: 5px"><div class="blur"></div><h3 class="text-center">Tabchi V1.0.0 Login </h3><hr><h6 class="text-center">%s </h6><br><form method="post" style="text-align: center">%s<br><button class="btn btn-info btn-block btn-sm" type="submit">Go</button></form></div></div></div></div><footer style="position: fixed; bottom: 0; width: 100vw"><h5 class="text-center">This File Was Shared On MadelineProto Farsi Channel <a class="btn btn-success btn-sm" role="button" href="https://t.me/MadelineProto_farsi" target="_blank">Join Us</a></h5></footer><script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script><script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script><script>$(document).ready(function() {$("select").addClass("form-control");$("input").addClass("form-control");$("img").hide();})</script></body></html>';
$data = json_decode(file_get_contents('./data/data.json'), true);
if (!isset($data['data']['sudo']) or isset($_GET['changeSudo'])) {
    if (!isset($_POST['sudo'])) {
        $input = '<input type="number" name="sudo" placeholder="Admin ID" minlength="6" title="Please Enter Admin ID" required>';
        $login = sprintf($template, $input, "Please Enter Admin ID, e.g. 847046122");
        echo $login;
        exit();
    } else {
        $data['data']['sudo'] = $_POST['sudo'];
        savedata($data);
        $url = "http".(!empty($_SERVER['HTTPS'])?"s":"").
            "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        header('location: ' . $url[0]);
    }
}
$dev = (int) $data['data']['sudo'];
$settings = [
    'logger' => [
        'max_size' => 1 * 1024 * 1024
    ],
    'serialization' => [
        'cleanup_before_serialization' => true
    ],
    'app_info' => [
        'api_id' => 839407,
        'api_hash' => '0a310f9d03f51e8aa00d9262ef55d62e'
    ]
];
$MadelineProto = new API('realSamy.madeline', $settings);
##------------------Variables-----------------##


##---------------Event Handler----------------##
class realSamy extends EventHandler
{
    /**
     * Get peer(s) where to report errors
     *
     * @return int|string|array
     */
    public function getReportPeers()
    {
        return [];
    }

    /**
     * Handle updates from supergroups and channels
     *
     * @param array $update Update
     *
     * @return void
     */
    public function onUpdateNewChannelMessage(array $update): \Generator
    {
        return $this->onUpdateNewMessage($update);
    }

    /**
     * Handle updates from users.
     *
     * @param array $update Update
     *
     * @return \Generator
     */
    public function onUpdateNewMessage(array $update): \Generator
    {
        if (isset($update['message']['out']) && $update['message']['out']) {
            return;
        }


        if (file_exists("./re")) {
            unlink('./re');
            $this->restart();
        }

        $data = json_decode(file_get_contents('./data/data.json'), true);
        $word = json_decode(file_get_contents('./data/word.json'), true);
        if (isset($update['message']['message'])) {
            $msg = $update['message']['message'];
            $msg_id = $update['message']['id'];
            $userID = (isset($update['message']['from_id'])) ? $update['message']['from_id'] : 'me';
            $chatID = $update;
            $peer = $update['message']['to_id'];
            $info = yield $this->getInfo($peer);
            $type = $info['type'];
            $type3 = (isset($type['type'])) ? $type['type'] : $type;
            $state = $data["data"]["state"];
            $ANS_GP = $data["data"]["ANS_GP"];
            $Read = $data["data"]["Read"];
            $Typing = $data["data"]["Typing"];
            $ANS_PV = $data["data"]["ANS_PV"];
            $Join = $data["data"]["Join"];
            $Save = $data["data"]["Save"];
            $JoinSave = $data["data"]["JoinSave"];
            $Saman = '<a href="mention:@realSamy">Saman</a>';
            $Samy = '<a href="mention:@realSamy">Samy</a>';
            $me = $this->getSelf();
            $me_id = $me['id'];
            $sudo = $GLOBALS['dev'];
            try {
                if ($userID == $sudo or isset($data['data']['Admins'][$userID])) {
                    if ($msg == "ping") {
                        yield $this->messages->sendMessage(['peer' => $update, 'message' => "pong!", 'reply_to_msg_id' => $msg_id]);
                    }
                    if ($msg == "Reset") {
                        $data['restart'] = true;
                        savedata($data);
                        yield $this->messages->sendMessage(['peer' => $update, 'message' => "Done!", 'reply_to_msg_id' => $msg_id]);

                    }
                    if ($msg == "Restart") {
                        if (isset($data['restart']) && $data['restart'] == true) {
                            yield $this->messages->sendMessage(['peer' => $update, 'message' => "Restarted!!", 'reply_to_msg_id' => $msg_id]);
                            $data['restart'] = false;
                            savedata($data);
                            die('Restarted Successfully!');
                        } else {
                            yield $this->messages->sendMessage(['peer' => $update, 'message' => "Reset not set!!", 'reply_to_msg_id' => $msg_id]);
                        }

                    }


                }
                if ($Read === "آنلاین✅") {
                    if (in_array($type, ["supergroup", "channel"])) {
                        yield $this->channels->readMessageContents(['channel' => $chatID, 'id' => [$msg_id]]);
                    } else {
                        yield $this->messages->readMessageContents(['channel' => $chatID, 'id' => [$msg_id]]);
                    }
                }
            } catch (RPCErrorException $e) {

                $this->report("ارور: " . $e->rpc);

            } catch (Exception $e) {
            }
            try {
                if ($userID === $sudo or isset($data["data"]["Admins"][$userID]) and $state === "آنلاین✅") {
                    if (preg_match('/^setphoto$/i', $msg, $mch)) {
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
                                $text = "Profile Photo Uploaded Successfully!";
                            } else {
                                $text = "This Command Should Be Used In Reply Of A Photo!";
                            }

                        } else {
                            $text = "This Command Should Be Used In Reply Of A Photo!";
                        }
                        yield$this->messages->sendMessage(['peer' => $peer, 'reply_to_msg_id' => $msg_id, 'message' => $text]);
                    }
                    if (preg_match('/^delphoto ([0-9]{1,3})$/i', $msg, $mch)) {
                        $tdd = $mch[1];
                        $me = yield$this->getSelf();
                        $photos = yield$this->photos->getUserPhotos(['user_id' => 'me', 'offset' => 0, 'max_id' => 0, 'limit' => $tdd,]);
                        $a = yield$this->photos->deletePhotos(['id' => $photos['photos'],]);
                        $cc = count($a);
                        yield$this->messages->sendMessage(['peer' => $peer, 'reply_to_msg_id' => $msg_id, 'message' => "$cc عکس پروفایل حذف شد!"]);
                    }
                    if (preg_match("/^[#!\/]?(f2all)$/i", $msg)) {
                        if (isset($update['message']['reply_to_msg_id'])) {
                            $rid = $update['message']['reply_to_msg_id'];
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️ پست شما به همه پیوی ها ارسال خواهد شد!
                ⏰ تاخیر بین هر ارسال 2 ثانیه", 'parse_mode' => 'html']);
                            $dialogs = yield $this->getDialogs();
                            foreach ($dialogs as $peer) {
                                $type = yield $this->getInfo($peer);
                                $type3 = $type['type'];
                                if ($type3 == "supergroup" || $type3 == "user" || $type3 == "supergroup") {
                                    try {
                                        yield $this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid],]);
                                    } catch (RPCErrorException $e) {

                                        $this->report("ارور: " . $e->rpc);

                                    } catch (Exception $e) {
                                    }
                                }
                                sleep(2);
                            }
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "عملیات تکمیل شد!"]);
                        }
                    } else if (preg_match("/^[#!\/]?(s2all)$/i", $msg)) {
                        if (isset($update['message']['reply_to_msg_id'])) {
                            $rid = $update['message']['reply_to_msg_id'];
                            if (in_array($type, ['channel', 'supergroup'])) {
                                $messeg = yield$this->channels->getMessages(['channel' => $peer, 'id' => [$rid],]);
                            } else {
                                $messeg = yield$this->messages->getMessages(['id' => [$rid],]);
                            }
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️ پست شما به همه چت ها ارسال خواهد شد!
                ⏰ تاخیر بین هر ارسال 2 ثانیه", 'parse_mode' => 'html']);
                            $messeg = $messeg['messages'][0];
                            if (!isset($messeg['media'])) {
                                $text = (isset($messeg['message'])) ? $messeg['message'] : null;
                                $entities = (isset($messeg['entities'])) ? $messeg['entities'] : null;
                            } else {
                                $media = $messeg['media'];
                                $text = (isset($messeg['message'])) ? $messeg['message'] : null;
                                $entities = (isset($messeg['entities'])) ? $messeg['entities'] : null;
                            }

                            $dialogs = yield $this->getDialogs();
                            foreach ($dialogs as $peer) {
                                $type = yield $this->getInfo($peer);
                                $type3 = $type['type'];
                                try {
                                    if ($type3 == "supergroup" || $type3 == "user" || $type3 == "chat") {
                                        if (!isset($media)) {
                                            yield $this->messages->sendMessage(['peer' => $peer, 'message' => $text, 'entities' => $entities, 'parse_mode' => 'Markdown']);
                                        } else {
                                            yield $this->messages->sendMedia(['peer' => $peer, 'message' => $text, 'media' => $media, 'entities', $entities, 'parse_mode' => 'Markdown']);
                                        }
                                    }
                                } catch (RPCErrorException $e) {

                                    $this->report("ارور: " . $e->rpc);

                                } catch (Exception $e) {
                                }
                                sleep(2);
                            }
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "عملیات تکمیل شد!"]);
                        }
                    } else if (preg_match("/^[#!\/]?(f2sgps)$/i", $msg)) {
                        if (isset($update['message']['reply_to_msg_id'])) {
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️ پست شما به همه سوپرگروه ها فوروارد خواهد شد!
                ⏰ تاخیر بین هر ارسال 2 ثانیه", 'parse_mode' => 'html']);
                            $rid = $update['message']['reply_to_msg_id'];
                            $dialogs = yield $this->getDialogs();

                            foreach ($dialogs as $peer) {
                                $type = yield $this->getInfo($peer);
                                $type3 = $type['type'];
                                if ($type3 == "supergroup") {
                                    try {
                                        yield $this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid],]);
                                    } catch (RPCErrorException $e) {

                                        $this->report("ارور: " . $e->rpc);

                                    } catch (Exception $e) {
                                    }
                                    sleep(2);

                                }

                            }
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "عملیات تکمیل شد!"]);
                        }
                    } else if (preg_match("/^[#!\/]?(s2sgps)$/i", $msg)) {
                        if (isset($update['message']['reply_to_msg_id'])) {
                            $rid = $update['message']['reply_to_msg_id'];
                            if (in_array($type, ['channel', 'supergroup'])) {
                                $messeg = yield$this->channels->getMessages(['channel' => $peer, 'id' => [$rid],]);
                            } else {
                                $messeg = yield$this->messages->getMessages(['id' => [$rid],]);
                            }
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️ پست شما به همه سوپرگروه ها ارسال خواهد شد!
                ⏰ تاخیر بین هر ارسال 2 ثانیه", 'parse_mode' => 'html']);
                            $messeg = $messeg['messages'][0];
                            if (!isset($messeg['media'])) {
                                $text = (isset($messeg['message'])) ? $messeg['message'] : null;
                                $entities = (isset($messeg['entities'])) ? $messeg['entities'] : null;
                            } else {
                                $media = $messeg['media'];
                                $text = (isset($messeg['message'])) ? $messeg['message'] : null;
                                $entities = (isset($messeg['entities'])) ? $messeg['entities'] : null;
                            }

                            $dialogs = yield $this->getDialogs();
                            foreach ($dialogs as $peer) {
                                $type = yield $this->getInfo($peer);
                                $type3 = $type['type'];
                                try {
                                    if ($type3 == "supergroup") {
                                        if (!isset($media)) {
                                            yield $this->messages->sendMessage(['peer' => $peer, 'message' => $text, 'entities' => $entities, 'parse_mode' => 'Markdown']);
                                        } else {
                                            yield $this->messages->sendMedia(['peer' => $peer, 'message' => $text, 'media' => $media, 'entities', $entities, 'parse_mode' => 'Markdown']);
                                        }
                                    }
                                } catch (RPCErrorException $e) {

                                    $this->report("ارور: " . $e->rpc);

                                } catch (Exception $e) {
                                }
                                sleep(2);
                            }
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "عملیات تکمیل شد!"]);
                        }


                    } else if (preg_match("/^[#!\/]?(f2gps)$/i", $msg)) {
                        if (isset($update['message']['reply_to_msg_id'])) {
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️ پست شما به همه گروه ها فوروارد خواهد شد!
                ⏰ تاخیر بین هر ارسال 2 ثانیه", 'parse_mode' => 'html']);
                            $rid = $update['message']['reply_to_msg_id'];
                            $dialogs = yield $this->getDialogs();

                            foreach ($dialogs as $peer) {
                                $type = yield $this->getInfo($peer);
                                $type3 = $type['type'];
                                try {
                                    if ($type3 == "chat") {
                                        yield $this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid],]);
                                        sleep(2);
                                    }
                                } catch (RPCErrorException $e) {

                                    $this->report("ارور: " . $e->rpc);

                                } catch (Exception $e) {
                                }

                            }
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "عملیات تکمیل شد!"]);
                        }
                    } else if (preg_match("/^[#!\/]?(s2gps)$/i", $msg)) {
                        if (isset($update['message']['reply_to_msg_id'])) {
                            $rid = $update['message']['reply_to_msg_id'];
                            if (in_array($type, ['channel', 'supergroup'])) {
                                $messeg = yield$this->channels->getMessages(['channel' => $peer, 'id' => [$rid],]);
                            } else {
                                $messeg = yield$this->messages->getMessages(['id' => [$rid],]);
                            }
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️ پست شما به همه گروه ها ارسال خواهد شد!
                ⏰ تاخیر بین هر ارسال 2 ثانیه", 'parse_mode' => 'html']);
                            $messeg = $messeg['messages'][0];
                            if (!isset($messeg['media'])) {
                                $text = (isset($messeg['message'])) ? $messeg['message'] : null;
                                $entities = (isset($messeg['entities'])) ? $messeg['entities'] : null;
                            } else {
                                $media = $messeg['media'];
                                $text = (isset($messeg['message'])) ? $messeg['message'] : null;
                                $entities = (isset($messeg['entities'])) ? $messeg['entities'] : null;
                            }

                            $dialogs = yield $this->getDialogs();
                            foreach ($dialogs as $peer) {
                                $type = yield $this->getInfo($peer);
                                $type3 = $type['type'];
                                try {
                                    if ($type3 == "chat") {
                                        if (!isset($media)) {
                                            yield $this->messages->sendMessage(['peer' => $peer, 'message' => $text, 'entities' => $entities, 'parse_mode' => 'Markdown']);
                                        } else {
                                            yield $this->messages->sendMedia(['peer' => $peer, 'message' => $text, 'media' => $media, 'entities', $entities, 'parse_mode' => 'Markdown']);
                                        }
                                    }
                                } catch (RPCErrorException $e) {

                                    $this->report("ارور: " . $e->rpc);

                                } catch (Exception $e) {
                                }
                                sleep(2);
                            }
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "عملیات تکمیل شد!"]);
                        }


                    } else if (preg_match("/^[#!\/]?(f2pvs)$/i", $msg)) {
                        if (isset($update['message']['reply_to_msg_id'])) {
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️ پست شما به همه پیوی ها فوروارد خواهد شد!
                ⏰ تاخیر بین هر ارسال 2 ثانیه", 'parse_mode' => 'html']);
                            $rid = $update['message']['reply_to_msg_id'];
                            $dialogs = yield $this->getDialogs();

                            foreach ($dialogs as $peer) {
                                $type = yield $this->getInfo($peer);
                                $type3 = $type['type'];
                                try {
                                    if ($type3 == "user") {
                                        yield $this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid],]);
                                        sleep(2);
                                    }
                                } catch (RPCErrorException $e) {

                                    $this->report("ارور: " . $e->rpc);

                                } catch (Exception $e) {
                                }
                            }
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "عملیات تکمیل شد!"]);
                        }
                    } else if (preg_match("/^[#!\/]?(s2pvs)$/i", $msg)) {
                        if (isset($update['message']['reply_to_msg_id'])) {
                            $rid = $update['message']['reply_to_msg_id'];
                            if (in_array($type, ['channel', 'supergroup'])) {
                                $messeg = yield$this->channels->getMessages(['channel' => $peer, 'id' => [$rid],]);
                            } else {
                                $messeg = yield$this->messages->getMessages(['id' => [$rid],]);
                            }
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️ پست شما به همه پیوی ها ارسال خواهد شد!
                ⏰ تاخیر بین هر ارسال 2 ثانیه", 'parse_mode' => 'html']);
                            $messeg = $messeg['messages'][0];
                            if (!isset($messeg['media'])) {
                                $text = (isset($messeg['message'])) ? $messeg['message'] : null;
                                $entities = (isset($messeg['entities'])) ? $messeg['entities'] : null;
                            } else {
                                $media = $messeg['media'];
                                $text = (isset($messeg['message'])) ? $messeg['message'] : null;
                                $entities = (isset($messeg['entities'])) ? $messeg['entities'] : null;
                            }

                            $dialogs = yield $this->getDialogs();
                            foreach ($dialogs as $peer) {
                                $type = yield $this->getInfo($peer);
                                $type3 = $type['type'];
                                try {
                                    if ($type3 == "user") {
                                        if (!isset($media)) {
                                            yield $this->messages->sendMessage(['peer' => $peer, 'message' => $text, 'entities' => $entities, 'parse_mode' => 'Markdown']);
                                        } else {
                                            yield $this->messages->sendMedia(['peer' => $peer, 'message' => $text, 'media' => $media, 'entities', $entities, 'parse_mode' => 'Markdown']);
                                        }
                                    }
                                } catch (RPCErrorException $e) {

                                    $this->report("ارور: " . $e->rpc);

                                } catch (Exception $e) {
                                }
                                sleep(2);
                            }
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "عملیات تکمیل شد!"]);
                        }


                    }
                    if (preg_match("/^[#!\/]?(addall) (.*)$/i", $msg)) {
                        preg_match("/^[#!\/]?(addall) (.*)$/i", $msg, $text1);
                        if (isset($text1[2])) {
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️ کاربر مورد نظر به همه گروه ها ادد خواهد شد! \nCreator: $Saman", 'parse_mode' => "html"]);
                            $user = $text1[2];
                            $dialogs = yield $this->getDialogs();
                            foreach ($dialogs as $peer) {
                                $type = yield $this->getInfo($peer);
                                $type3 = $type['type'];
                                try {
                                    if ($type3 == "supergroup") {
                                        yield $this->channels->inviteToChannel(['channel' => $peer, 'users' => [$user]]);
                                    }
                                } catch (RPCErrorException $e) {

                                    $this->report("ارور: " . $e->rpc);

                                } catch (Exception $e) {
                                }
                            }
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "عملیات تکمیل شد!"]);
                        }

                    }
                    if (preg_match("/^[#!\/]?(addpvs)/i", $msg)) {
                        if (preg_match("/^[#!\/]?(addpvs)$/i", $msg)) {
                            if ($type == "supergroup") {
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️ کاربران پیوی به گروه مورد نظر ادد خواهند شد! \nCreator: $Saman", 'parse_mode' => "html"]);
                                $chat = yield $this->getPwrChat($chatID);
                                foreach ($chat['participants'] as $pars) {
                                    $ids[] = $pars['user']['id'];
                                }
                                $ids[] = 777000;
                                $dialogs = yield $this->getDialogs();
                                $users = [];
                                foreach ($dialogs as $user) {
                                    $type = yield $this->getInfo($user);
                                    $type3 = $type['type'];
                                    if ($type3 == "user" && !in_array($user['user_id'], $ids)) {
                                        $users[] = $user;
                                    }
                                }
                                try {
                                    yield $this->channels->inviteToChannel(['channel' => $chatID, 'users' => $users]);
                                } catch (RPCErrorException $e) {

                                    $this->report("ارور: " . $e->rpc);

                                } catch (Exception $e) {
                                }
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "عملیات تکمیل شد!"]);
                            }
                        } else if (preg_match("/^[#!\/]?(addpvs) (.*)$/i", $msg, $mch)) {
                            if (isset($mch[2])) {
                                $peer = $mch[2];
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️ کاربران پیوی به $peer ادد خواهند شد! \nCreator: $Saman", 'parse_mode' => "html"]);
                                $chat = yield $this->getPwrChat($peer);
                                foreach ($chat['participants'] as $pars) {
                                    $ids[] = $pars['user']['id'];
                                }
                                $ids[] = 777000;
                                $dialogs = yield $this->getDialogs();
                                $users = [];
                                foreach ($dialogs as $user) {
                                    $type = yield $this->getInfo($user);
                                    $type3 = $type['type'];
                                    if ($type3 == "user" && !in_array($user['user_id'], $ids)) {
                                        $users[] = $user;
                                    }
                                }
                                try {
                                    yield $this->channels->inviteToChannel(['channel' => $peer, 'users' => $users]);
                                } catch (RPCErrorException $e) {

                                    $this->report("ارور: " . $e->rpc);

                                } catch (Exception $e) {
                                }
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "عملیات تکمیل شد!"]);
                            }
                        }
                    }

                }
            } catch (RPCErrorException $e) {

                $this->report("ارور: " . $e->rpc);

            } catch (Exception $e) {
            }
            try {
                #########################################
                if ($userID === $sudo or isset($data['data']['Admins'][$userID])) {
                    if (preg_match('/^[\/!#]?(tabchi|bot) (on|off)$/i', $msg, $mch)) {
                        if (preg_match('/on/', $mch[2])) {
                            $data["data"]["state"] = "آنلاین✅";
                            $text = "تبچی با موفقیت روشن شد!\n\nCreator: $Saman";
                        } else {
                            $data["data"]["state"] = "خاموش❌";
                            $text = "تبچی با موفقیت خاموش شد!\n\nCreator: $Saman";
                        }
                        savedata($data);
                        yield $this->messages->sendMessage(['peer' => $chatID, 'parse_mode' => 'html', 'message' => $text, 'reply_to_msg_id' => $msg_id]);
                    }
                    if (in_array($msg, ['state', 'vaziat', 'آنلاین✅', 'ربات', 'آنلاین', 'پینگ'])) {
                        $text = "ربات $state است." . PHP_EOL . "$Saman";
                        yield $this->messages->sendMessage(['peer' => $chatID, 'parse_mode' => 'html', 'message' => $text, 'reply_to_msg_id' => $msg_id]);
                    }
                    ##==========================SETTINGS==========================##
                    if ($state === "آنلاین✅") {
                        if ($userID === $sudo or isset($data['data']['Admins'][$userID])) {
                            if ($state === "آنلاین✅") {
                                if (preg_match("/^[#!\/]?(addadmin) (.*)$/i", $msg)) {
                                    preg_match("/^[#!\/]?(addadmin) (.*)$/i", $msg, $text1);
                                    $Username = $text1[2];
                                    $Array = yield $this->getFullInfo($Username);
                                    $user_iD = $Array['bot_api_id'];
                                    if (!isset($data["data"]["Admins"][$user_iD])) {
                                        $data["data"]["Admins"][$user_iD] = $Username;
                                        savedata($data);
                                        yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "📣کاربر $Username ادمین ربات تنظیم شد \nCreator: $Saman ", 'parse_mode' => 'html']);
                                    } else {
                                        yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "📌 کاربر $Username از قبل ادمین بوده است\nCreator: $Samy ", 'parse_mode' => 'html']);
                                    }
                                }

                                if (preg_match("/^[#!\/]?(deladmin) (.*)$/i", $msg)) {
                                    preg_match("/^[#!\/]?(deladmin) (.*)$/i", $msg, $text1);
                                    $Username = $text1[2];
                                    $Array = yield $this->getFullInfo($Username);
                                    $user_iD = $Array['bot_api_id'];
                                    if (isset($data["data"]["Admins"][$user_iD])) {
                                        unset($data["data"]["Admins"][$user_iD]);
                                        savedata($data);
                                        yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "📣کاربر $Username از ادمینی عزل شد", 'parse_mode' => 'html']);
                                    } else {
                                        yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "📌 کاربر $Username جزو ادمین های ربات نیست", 'parse_mode' => 'html']);
                                    }

                                }
                                if (preg_match("/^[#!\/]?(listadmin)$/i", $msg)) {
                                    $T = "📃 لیست همه ادمین ها";
                                    $cc = 1;
                                    foreach ($data['data']['Admins'] as $k => $u) {
                                        $T .= "\n🗣 $cc ⇨ <a href='tg://user?id=$k'>$k</a>";
                                        $cc++;
                                    }
                                    yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "$T", 'parse_mode' => 'html']);
                                }

                                if ($msg == "امار") {
                                    $CL_c = 0;
                                    $CH_c = 0;
                                    $Gps_c = 0;
                                    $Pvs_c = 0;
                                    $dgs = yield $this->getFullDialogs();
                                    foreach ($dgs as $dg) {
                                        if (isset($dg['peer'])) {
                                            $peer = $dg['peer'];
                                            $info = yield $this->getInfo($peer);
                                            $type = $info['type'];
                                            switch ($type) {
                                                case "channel":
                                                    $CL_c++;
                                                    break;
                                                case "user":
                                                    $Pvs_c++;
                                                    break;
                                                case "chat":
                                                    $Gps_c++;
                                                    break;
                                                case "supergroup":
                                                    $CH_c++;
                                                    break;
                                                default:
                                                    continue;
                                            }
                                        }
                                    }
                                    $mem_using = round(memory_get_usage() / 1024 / 1024, 1);
                                    yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "📊 وضعیت تبچی : $state

----------------
👥 تعداد سوپرگروه ها : $CH_c
----------------
👣 تعداد گروه ها : $Gps_c
----------------
📩 تعداد پیوی ها : $Pvs_c
----------------
📢  تعداد کانال ها : $CL_c
----------------
☎️ چت خودکار پیوی : $ANS_PV
----------------
 چت خودکار گروه : $ANS_GP
----------------
♻️ مقدار رم درحال استفاده : $mem_using مگابایت
----------------

Creator: $Samy", 'parse_mode' => 'html']);
                                }
                                if ($msg == "help" || $msg == "Help" || $msg == "راهنما" || $msg == "هلپ") {
                                    yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => " ⚠️ راهنمای تبچی :
    
    🔱 آنلاین - ربات - state - vaziat
    • دریافت وضعیت ربات
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 امار
    •دریافت آمار گروه ها و کاربران
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 AddAdmin [ID]
    • افزودن ادمین به ربات با آیدی عددی
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 DelAdmin [ID]
    • عزل کردن ادمین ربات با آیدی عددی
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 ListAdmin
    • نمایش لیست ادمین های ربات
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 Type on
    • فعال شدن حالت تایپینگ بعد از هر پیام 
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 Type off
    • غیرفعال شدن حالت تایپینگ بعد از هر پیام
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 Read on
    • فعال شدن حالت خوانده شدن پیام ها
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 Read off
    • غیرفعال شدن حالت خوانده شدن پیام ها
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 PvAnswer on
    • فعال کردن چت خودکار در پیوی
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 PvAnswer off
    • غیرفعال کردن چت خودکار در پیوی
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 GpAnswer on
    • فعال کردن چت خودکار در گروه
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 GpAnswer off
    • غیرفعال کردن چت خودکار در گروه
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 Word on
    • فعال کردن جواب سریع
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 Word off
    • غیرفعال کردن جواب سریع
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 SetAnswer Word|Answer
    • افزودن جواب سریع به ربات
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 DelAnswer Word
    • حذف یک کلمه از ربات
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 AnswerList
    • لیست کلمات ذخیره شده
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 Clean Answers
    • خالی کردن لیست جواب های سریع
    
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 addpvs
    • ادد کردن همه پیوی ها به گروه
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 addall [UserID]
    • ادد کردن یک کاربر به همه گروه ها
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 f2all [reply]
    • فروارد کردن پیام ریپلای شده به همه گروه ها و کاربران
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 f2pvs [reply]
    • فروارد کردن پیام ریپلای شده به همه کاربران
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 f2gps [reply]
    • فروارد کردن پیام ریپلای شده به همه گروه ها
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 f2sgps [reply]
    • فروارد کردن پیام ریپلای شده به همه سوپرگروه ها
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 s2all [reply]
    • ارسال کردن پیام ریپلای شده به همه گروه ها و کاربران
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 s2pvs [reply]
    • ارسال کردن پیام ریپلای شده به همه کاربران
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 s2gps [reply]
    • ارسال کردن پیام ریپلای شده به همه گروه ها
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 s2sgps [reply]
    • ارسال کردن پیام ریپلای شده به همه سوپرگروه ها
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 set [ID]
    • تنظیم نام کاربری (آیدی) ربات
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 Profile [First Name]|[Last Name]|[Bio]
    • تنظیم نام اسم , فامیل و بیوگرافی ربات 
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 SetPhoto [reply]
    • تنظیم عکس ریپلی شده بعنوان پروفایل ربات 
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 DelPhoto [number]
    • حذف پروفایل های ربات 
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 Join on
    • ورود خودکار ربات به گروه باارسال لینک
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 Join off
    • جلوگیری از ورود خودکار ربات به گروه 
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 Save on
    • ذخیره کردن لینک های عضو نشده
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 Save off
    • جلوگیری از ذخیره کردن لینک های عضو نشده 
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 JoinSave on
    • ورود خودکار ربات به لینک های ذخیره شده
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    🔱 JoinSave off
    • جلوگیری از ورود خودکار ربات لینک های ذخیره شده 
    〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
    
    🔱 Creator: $Saman ", 'parse_mode' => 'html']);
                                }


                            }
                        }
                    }
                }

            } catch (RPCErrorException $e) {

                $this->report("ارور: " . $e->rpc);

            } catch (Exception $e) {
            }

            $A_SLM = ["سلام😇",
                "سلام 🙃", "سلام 😶", "دلام",
                "شلوم😵", "سلام", "slm",
                "Slm😛", "سلام چطوری 😒", "😑😑😑😑",
                "☹س", "😐صلام", "🙄",
                "شلام 😸", "سلام 😿", "دلام دوبی 🤕",
                "salam", "slm khobi 😶", "چطوری 🙄",
                "خوبی ؟ ☹", "صلوم 🙃", "slm",

            ];
            $A_KHOBI = ["خوبم مرسی تو خوبی",
                "ممنون تو خوبی 😶", "🙄", "چطوری 😵",
                "mmnon to khobi ? 🙄", "فدات ", "مرسی ",
                "mrc 🌸", "فدای داری 😛", "slm",

            ];
            $A_FADAT = ["😻",
                "😘", "😃", "💛",
                "💚", "🙂", "🙃",
                "اصل میدی", "😋", "اصل ؟",
                "😉", "🤗", "slm",
                "😦", "☹", "🙁",
                "😯", "😑", "slm",
                "اasl🙃",
            ];
            $A_ASL = ["slm",
                "18 teh", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm"

            ];
            $A_EMOJI = ["slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm",
                "slm", "slm", "slm"

            ];

            $slm_r = array_rand($A_SLM);
            $R_SLM = $A_SLM[$slm_r];

            $khobi_r = array_rand($A_KHOBI);
            $R_KHOBI = $A_KHOBI[$khobi_r];

            $fadat_r = array_rand($A_FADAT);
            $R_FADAT = $A_FADAT[$fadat_r];

            $asl_r = array_rand($A_ASL);
            $R_ASL = $A_ASL[$asl_r];

            $emoji_r = array_rand($A_EMOJI);
            $R_EMOJI = $A_EMOJI[$emoji_r];

            try {
                if (true) {
                    if ($word['on'] === "on") {
                        if (isset($word["word"]["$msg"])) {
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => $word["word"]["$msg"], 'parse_mode' => 'html']);
                        }
                    }
                    if ($type == "supergroup" or $type3 == "chat") {
                        if ($ANS_GP === "آنلاین✅") {
                            if (preg_match("/^([سدصث]{1,8}[ل]{1,8}[اآ]{1,8}[م]{1,8})|([s]{1,8}[l]{1,8}[m]{1,8})|([s]{1,8}[a]{1,8}[l]{1,8}[a]{1,8}[m]{1,8})/i", $msg)) {
                                if ($Read === "آنلاین✅") {
                                    yield $this->channels->readMessageContents(['channel' => $chatID, 'id' => [$msg_id]]);
                                }
                                if ($Typing === "آنلاین✅") {
                                    $sendMessageTypingAction = ['_' => 'sendMessageTypingAction'];
                                    yield $this->messages->setTyping(['peer' => $chatID, 'action' => $sendMessageTypingAction]);
                                }
                                yield $this->sleep(1.3);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "$R_SLM", 'parse_mode' => 'MarkDown']);
                            } else if (preg_match('/^([خ|د]{1,9}[و]{0,9}[ب|ف]{1,9}[ی]{1,9})|([چ|ج|ش]{1,9}[ط|ت]{1,9}[و]{0,9}[ر|ل]{1,9}[ی]{1,9})|([k]{1,9}[h]{1,9}[o]{0,9}[b]{1,9}[i]{1,9})|([c]{1,9}[h]{1,9}[e]{0,9}[t]{1,9}[o]{0,9}[r|l]{1,9}[i]{1,9})/i', $msg)) {
                                if ($Read === "آنلاین✅") {
                                    yield $this->channels->readMessageContents(['channel' => $chatID, 'id' => [$msg_id]]);
                                }
                                if ($Typing === "آنلاین✅") {
                                    $sendMessageTypingAction = ['_' => 'sendMessageTypingAction'];
                                    yield $this->messages->setTyping(['peer' => $chatID, 'action' => $sendMessageTypingAction]);
                                }
                                yield $this->sleep(1.3);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "$R_KHOBI", 'parse_mode' => 'MarkDown']);
                            } else if (preg_match('/^([ف]{1,8}[د]{1,8}[ا|آ]{1,8}[ت|ط]{1,8}[م]{0,8})|([f]{1,8}[a]{0,8}[d]{1,8}[a]{0,8}[t]{1,8}[a]{0,8}[m]{0,8})/', $msg)) {
                                if ($Read === "آنلاین✅") {
                                    yield $this->channels->readMessageContents(['channel' => $chatID, 'id' => [$msg_id]]);
                                }
                                if ($Typing === "آنلاین✅") {
                                    $sendMessageTypingAction = ['_' => 'sendMessageTypingAction'];
                                    yield $this->messages->setTyping(['peer' => $chatID, 'action' => $sendMessageTypingAction]);
                                }
                                yield $this->sleep(1.3);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "$R_FADAT", 'parse_mode' => 'MarkDown']);
                            }
                        }
                    } else if ($type == "user") {
                        if ($ANS_PV === "آنلاین✅") {

                            if (preg_match("/^([س|د|ص|ث]{1,8}[ل]{1,8}[ا|آ]{1,8}[م]{1,8})|([s]{1,8}[l]{1,8}[m]{1,8})|([s]{1,8}[a]{1,8}[l]{1,8}[a]{1,8}[m]{1,8})/i", $msg)) {
                                if ($Read === "آنلاین✅") {
                                    yield $this->messages->readMessageContents(['channel' => $chatID, 'id' => [$msg_id]]);
                                }
                                if ($Typing === "آنلاین✅") {
                                    $sendMessageTypingAction = ['_' => 'sendMessageTypingAction'];
                                    yield $this->messages->setTyping(['peer' => $chatID, 'action' => $sendMessageTypingAction]);
                                }
                                yield $this->sleep(1.3);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "$R_SLM", 'parse_mode' => 'MarkDown']);
                            } else if (preg_match("/^([خ|د]{1,9}[و]{0,9}[ب|ف]{1,9}[ی]{1,9})|([چ|ج|ش]{1,9}[ط|ت]{1,9}[و]{0,9}[ر|ل]{1,9}[ی]{1,9})|([k]{1,9}[h]{1,9}[o]{0,9}[b]{1,9}[i]{1,9})|([c]{1,9}[h]{1,9}[e]{0,9}[t]{1,9}[o]{0,9}[r|l]{1,9}[i]{1,9})/i", $msg)) {
                                if ($Read === "آنلاین✅") {
                                    yield $this->messages->readMessageContents(['channel' => $chatID, 'id' => [$msg_id]]);
                                }
                                if ($Typing === "آنلاین✅") {
                                    $sendMessageTypingAction = ['_' => 'sendMessageTypingAction'];
                                    yield $this->messages->setTyping(['peer' => $chatID, 'action' => $sendMessageTypingAction]);
                                }
                                yield $this->sleep(1.3);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "$R_KHOBI", 'parse_mode' => 'MarkDown']);
                            } else if (preg_match('/^([ف]{1,8}[د]{1,8}[ا|آ]{1,8}[ت|ط]{1,8}[م]{0,8})|([f]{1,8}[a]{0,8}[d]{1,8}[a]{0,8}[t]{1,8}[a]{0,8}[m]{0,8})/', $msg)) {
                                if ($Read === "آنلاین✅") {
                                    yield $this->messages->readMessageContents(['channel' => $chatID, 'id' => [$msg_id]]);
                                }
                                if ($Typing === "آنلاین✅") {
                                    $sendMessageTypingAction = ['_' => 'sendMessageTypingAction'];
                                    yield $this->messages->setTyping(['peer' => $chatID, 'action' => $sendMessageTypingAction]);
                                }
                                yield $this->sleep(1.3);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "$R_FADAT", 'parse_mode' => 'MarkDown']);
                            }
                        }
                    }
                }

            } catch (RPCErrorException $e) {

                $this->report("ارور: " . $e->rpc);
            } catch (Exception $e) {
            }
            try {
                if ($state === "آنلاین✅") {

                    if ($userID === $sudo or isset($data["data"]["Admins"][$userID])) {
                        if (preg_match('/(t|telegram).me\/joinchat\/([a-z0-9\-]{5,40})/i', $msg)) {
                            preg_match_all('/(t|telegram).me\/joinchat\/([a-z0-9\-_]{5,40})/i', $msg, $l);
                            if ($Join === "آنلاین✅") {
                                if (isset($l[2])) {
                                    $links = $l[2];
                                    foreach ($links as $link) {
                                        try {
                                            $check = yield $this->messages->checkChatInvite(['hash' => $link,]);
                                        } catch (RPCErrorException $e) {

                                            $this->report("ارور: " . $e->rpc);

                                        } catch (Exception $e) {
                                        }
                                        if (isset($check['title']) and $check['_'] !== "chatInviteAlready") {
                                            try {
                                                $joined = yield $this->messages->importChatInvite([
                                                    'hash' => $link,]);
                                            } catch (RPCErrorException $e) {

                                                $this->report("ارور: " . $e->rpc);

                                            } catch (Exception $e) {
                                            }
                                            if (isset($joined['chats'])) {
                                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "تبچی 𝕊𝕒𝕞𝕒𝕟 در یک لینک عضو شد♻️ \nCreator: $Saman ", 'parse_mode' => 'html']);
                                                yield $this->sleep(3);
                                            } else {
                                                if ($Save === "آنلاین✅" && !isset($joined['chats'])) {
                                                    if (!isset($data["data"]["links"])) {
                                                        $data['data']['links'] = [];
                                                    }
                                                    if (!in_array($link, $data["data"]["links"])) {
                                                        $data["data"]["links"][] = $link;
                                                        savedata($data);
                                                        yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️به دلیل محدودیت یک لینک ذخیره شد", 'parse_mode' => 'html']);
                                                    }
                                                }
                                            }
                                        } else {
                                            yield $this->messages->sendMessage(['peer' => $chatID,
                                                'reply_to_msg_id' => $msg_id, 'message' => "♻️تبچی از قبل در t.me/joinchat/$link عضو است!", 'parse_mode' => 'html']);
                                        }
                                    }
                                    yield $this->sleep(3);
                                }
                            }
                        }
                    }
                }
            } catch (RPCErrorException $e) {

                $this->report("ارور: " . $e->rpc);

            } catch (Exception $e) {
            }
            try {
                if ($msg !== null) {
                    if ($Join === "آنلاین✅") {
                        if ($JoinSave === "آنلاین✅") {
                            if (isset($data["data"]["links"]) and count($data["data"]["links"]) > 0) {
                                $links_pack = $data["data"]["links"];
                                $fadat_r = array_rand($links_pack);
                                $link1 = $links_pack[$fadat_r];
                                $link = str_replace('https://t.me/joinchat/', '', $link1);
                                yield $this->messages->importChatInvite([
                                    'hash' => $link]);
                                yield $this->messages->sendMessage(['peer' => $me_id, 'message' => "♻️تبچی 𝕊𝕒𝕞𝕒𝕟 در یک لینک ذخیره شده عضو شد", 'parse_mode' => 'html']);
                                unset($data["data"]["links"][$fadat_r]);
                                savedata($data);
                                yield $this->sleep(1.2);
                            }
                        }
                    }
                }
                if ($userID === $sudo or isset($data["data"]["Admins"][$userID])) {
                    if ($state === "آنلاین✅") {
                        if (preg_match("/^[#!\/]?(type|typing) (on|off)$/i", $msg, $mch)) {
                            if (preg_match("/on/i", $mch[2])) {
                                $data["data"]["Typing"] = "آنلاین✅";
                                savedata($data);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️حالت تایپینگ تبچی روشن شد", 'parse_mode' => "html"]);
                                sleep(2);
                            } else {
                                $data["data"]["Typing"] = "خاموش❌";
                                savedata($data);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️حالت تایپینگ خاموش شد", 'parse_mode' => "html"]);
                                sleep(2);
                            }
                        }

                        if (preg_match("/^[#!\/]?(pvanswer) (on|off)$/i", $msg, $mch)) {
                            if (preg_match("/on/i", $mch[2])) {
                                $data["data"]["ANS_PV"] = "آنلاین✅";
                                savedata($data);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️پاسخ خودکار در پیوی ها روشن شد", 'parse_mode' => "html"]);
                                sleep(2);
                            } else {
                                $data["data"]["ANS_PV"] = "خاموش❌";
                                savedata($data);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️پاسخ خودکار در پیوی ها خاموش شد", 'parse_mode' => "html"]);
                                sleep(2);
                            }
                        }
                        if (preg_match("/^[#!\/]?(gpanswer) (on|off)$/i", $msg, $mch)) {
                            if (preg_match("/on/i", $mch[2])) {
                                $data["data"]["ANS_GP"] = "آنلاین✅";
                                savedata($data);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️پاسخ خودکار در گروه ها روشن شد", 'parse_mode' => "html"]);
                                sleep(2);
                            } else {
                                $data["data"]["ANS_GP"] = "خاموش❌";
                                savedata($data);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️پاسخ خودکار در گروه ها خاموش شد", 'parse_mode' => "html"]);
                                sleep(2);
                            }
                        }
                        if (preg_match("/^[#!\/]?(word) (on|off)$/i", $msg, $mch)) {
                            if (preg_match("/on/i", $mch[2])) {
                                $word["on"] = "on";
                                saveword($word);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️پاسخ به کلمات روشن شد", 'parse_mode' => "html"]);
                                sleep(2);
                            } else {
                                $word["on"] = "off";
                                saveword($word);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️پاسخ به کلمات خاموش شد", 'parse_mode' => "html"]);
                                sleep(2);
                            }
                        }
                        if (preg_match("/^[#!\/]?(join) (.*)$/i", $msg)) {
                            if (preg_match("/^[#!\/]?(join) (on|off)$/i", $msg, $mch)) {
                                if (preg_match("/on/i", $mch[2])) {
                                    $data["data"]["Join"] = "آنلاین✅";
                                    savedata($data);
                                    yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️جوین تبچی 𝕊𝕒𝕞𝕒𝕟 روشن شد", 'parse_mode' => "html"]);
                                    sleep(2);
                                } else {
                                    $data["data"]["Join"] = "خاموش❌";
                                    savedata($data);
                                    yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️جوین تبچی 𝕊𝕒𝕞𝕒𝕟 خاموش شد!", 'parse_mode' => "html"]);
                                    sleep(2);
                                }
                            } else if (preg_match("/^[#!\/]?(join) @(.*)$/i", $msg, $mch)) {
                                $a = yield $this->channels->joinChannel(['channel' => "@$mch[2]",]);
                                if (isset($a)) {
                                    yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️تبچی 𝕊𝕒𝕞𝕒𝕟 در @$mch[2] عضو شد!", 'parse_mode' => "html"]);
                                }
                            }
                        }
                        if (preg_match("/^[#!\/]?(leave)/i", $msg)) {
                            if (preg_match("/^[#!\/]?(leave)$/i", $msg)) {
                                $dialogs = yield $this->getDialogs();
                                foreach ($dialogs as $peer) {
                                    $type = yield $this->getInfo($peer);
                                    $type3 = $type['type'];
                                    try {
                                        if ($type3 == "supergroup") {
                                            $Chat = yield $this->getInfo($peer);
                                            $chat = $Chat['Chat'];
                                            if ($chat['banned_rights']['send_messages'] ?? false) {
                                                yield $this->channels->leaveChannel(['channel' => $peer,]);
                                            }
                                        } elseif ($type3 == 'channel') {
                                            yield $this->channels->leaveChannel(['channel' => $peer,]);
                                        }
                                    } catch (RPCErrorException $e) {

                                        $this->report("ارور: " . $e->rpc);

                                    } catch (Exception $e) {
                                    }
                                }
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "عملیات تکمیل شد!"]);
                            } else if (preg_match("/^[#!\/]?(leave) @(.*)$/i", $msg)) {
                                $a = yield $this->channels->leaveChannel(['channel' => "@$mch[2]",]);
                                if (isset($a)) {
                                    yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️تبچی 𝕊𝕒𝕞𝕒𝕟 از @$mch[2] خارج شد!", 'parse_mode' => "html"]);
                                }
                            }
                        }
                        if (preg_match("/^[#!\/]?(Save) (on|off)$/i", $msg, $mch)) {
                            if (preg_match("/on/i", $mch[2])) {
                                $data["data"]["Save"] = "آنلاین✅";
                                savedata($data);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️ذخیره لینک های جوین نشده تبچی 𝕊𝕒𝕞𝕒𝕟 روشن شد", 'parse_mode' => "html"]);
                                sleep(2);
                            } else {
                                $data["data"]["Save"] = "خاموش❌";
                                savedata($data);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️ذخیره لینک های جوین نشده تبچی 𝕊𝕒𝕞𝕒𝕟 خاموش شد!", 'parse_mode' => "html"]);
                                sleep(2);
                            }
                        }
                        if (preg_match("/^[#!\/]?(joinsave) (on|off)$/i", $msg, $mch)) {
                            if (preg_match("/on/i", $mch[2])) {
                                $data["data"]["JoinSave"] = "آنلاین✅";
                                savedata($data);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️جوین لینک های ذخیره شده تبچی 𝕊𝕒𝕞𝕒𝕟 روشن شد", 'parse_mode' => "html"]);
                                sleep(2);
                            } else {
                                $data["data"]["JoinSave"] = "خاموش❌";
                                savedata($data);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️جوین لینک های ذخیره شده تبچی 𝕊𝕒𝕞𝕒𝕟 خاموش شد!", 'parse_mode' => "html"]);
                                sleep(2);
                            }
                        }
                        if (preg_match("/^[#!\/]?(read) (on|off)$/i", $msg, $mch)) {
                            if (preg_match("/on/i", $mch[2])) {
                                $data["data"]["Read"] = "آنلاین✅";
                                savedata($data);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️تیک خواندن تبچی 𝕊𝕒𝕞𝕒𝕟 روشن شد", 'parse_mode' => "html"]);
                                sleep(2);
                            } else {
                                $data["data"]["Read"] = "خاموش❌";
                                savedata($data);
                                yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️تیک خواندن تبچی 𝕊𝕒𝕞𝕒𝕟 خاموش شد!", 'parse_mode' => "html"]);
                                sleep(2);
                            }
                        }
                        if ($Read === "آنلاین✅") {
                            if (in_array($type, ['channel', 'supergroup'])) {
                                yield $this->channels->readMessageContents(['channel' => $chatID, 'id' => [$msg_id]]);
                            } else {
                                yield $this->messages->readMessageContents(['id' => [$msg_id],]);
                            }

                        }

                        if ($Typing === "آنلاین✅") {
                            $sendMessageTypingAction = ['_' => 'sendMessageTypingAction'];
                            yield $this->messages->setTyping(['peer' => $chatID, 'action' => $sendMessageTypingAction]);
                        }

                        if (preg_match("/^[#!\/]?(set) (.*)$/i", $msg)) {
                            preg_match("/^[#!\/]?(set) (.*)$/i", $msg, $text1);
                            if (isset($text1[2])) {
                                $text = $text1[2];

                                $u = yield $this->account->updateUsername(['username' => $text,]);
                                if (isset($u)) {
                                    yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "یوزرنیم جدید:  $text", 'parse_mode' => "html"]);
                                }
                            }

                        }
                        if (preg_match('/^[\/!#]?setanswer (.*)\|(.*)/i', $msg, $mch)) {
                            if ($word["on"] == "on") {
                                if ($userID == $sudo) {
                                    $txt = $mch[1];
                                    $ans = $mch[2];
                                    if (!isset($word["word"]["$txt"])) {
                                        $word["word"]["$txt"] = "$ans";
                                        saveword($word);
                                        yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️ربات از این به بعد در جواب کلمه ($txt) جواب ($ans) را خواهد داد", 'parse_mode' => 'html']);
                                    }
                                }
                            }
                        }
                        if (preg_match('/^[\/!#]?delanswer (.*)\|(.*)/i', $msg, $mch)) {
                            if ($word["on"] == "on") {
                                if ($userID == $sudo) {
                                    $txt = $mch[1];
                                    $ans = $mch[2];
                                    if (isset($word["word"]["$txt"])) {
                                        unset($word["word"]["$txt"]);
                                        saveword($word);
                                        yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️کلمه ($txt) با موفقیت حذف شد!", 'parse_mode' => 'html']);
                                    }
                                }
                            }
                        }
                        if (preg_match('/^[\/!#]?answerlist$/i', $msg, $mch)) {
                            if ($word["on"] == "on") {
                                if ($userID == $sudo) {
                                    if ($word["word"] != null) {
                                        $num = 1;
                                        $list = "";
                                        foreach ($word["word"] as $txt => $ans) {
                                            $list = $list . "**$num** - کلمه : **$txt** ›› جواب : **$ans** \n";
                                            $num++;
                                        }
                                        yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️لیست کلماتی که در ربات ذخیره است و ربات به انها پاسخ میدهد :
            $list
           ", 'parse_mode' => 'markdown']);
                                    }
                                }

                            }
                        }
                        if (preg_match('/^[\/!#]?clean answers$/i', $msg, $mch)) {
                            if ($word["on"] == "on") {
                                if ($userID == $sudo) {
                                    if ($word["word"] != null) {
                                        $word["word"] = [];
                                        saveword($word);
                                        yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "♻️لیست جواب با موفقیت خالی شد.
            ", 'parse_mode' => 'html']);
                                    }
                                }

                            }
                        }
                        if (preg_match("/^[#!\/]?(profile) /i", $msg)) {
                            preg_match("/^[#!\/]?(profile) (.*)\|(.*)\|(.*)$/i", $msg, $mch);
                            $id1 = (isset($mch[2]) && $mch[2] !== "" && $mch[2] !== " ") ? $mch[2] : "Saman";
                            $id2 = (isset($mch[3])) ? $mch[3] : "";
                            $id3 = (isset($mch[4]) && $mch[4] !== "" && $mch[4] !== " ") ? $mch[4] : "@realSamy | PHP Developer";
                            yield $this->account->updateProfile(['first_name' => "$id1", 'last_name' => "$id2", 'about' => "$id3",]);
                            yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "
             #ғɪʀsᴛ ɴᴀᴍᴇ ✅ : $id1
            
             #ʟᴀsᴛ ɴᴀᴍᴇ ✅ : $id2
            
             #ʙɪᴏ ✅ : $id3
            
           
            ️", 'parse_mode' => 'html']);
                        }
                    }
                }
            } catch (RPCErrorException $e) {
                $this->report("ارور: " . $e->rpc);
            } catch (Exception $e) {
            }
        }
    }
}

##---------------Event Handler----------------##



$MadelineProto->startAndLoop(realSamy::class);
