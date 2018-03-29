<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('classbot.php');

$channelAccessToken = '8ZEyt3bl95MdIE6UMxx8mIaZopsOvc+FKVv42w8828TMBJkn0lMjASMrMK4GgpBLSwk3+EMJ6JZHGTS9vvpMqgs0yKADtkw4b1K4AJKlWjs9q0N0ZdNugGRsswoKf7v/i2C4HIBuGjPH4nMrkcAvdwdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'cca175a180e1814e1f0b3e3ba12d79bf';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $message['text']
                            )
                        )
                    ));
                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};

//rtnfinance.herokuapp.com/bot.php
