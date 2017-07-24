<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;
use Illuminate\Support\Facades\DB;


class WechatController extends Controller
{
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve(Application $wechat)
    {
        $wechat->server->setMessageHandler(function ($message) use ($wechat) {
            switch ($message->MsgType) {
                case 'event':
                    switch ($message->Event) {
                        case 'subscribe':
                            $openid = $message->FromUserName;
                            $user = $wechat->user->get($openid);
                            DB::transaction(function () use ($user) {
                                $user = collect($user)->except(['language', 'subscribe_time', 'groupid', 'tagid_list']);
                                User::firstOrCreate($user->toArray());
                            });
                            return "欢迎关注会员卡管家！";
                            break;
                        case 'unsubscribe':
                            return "取消关注会员卡管家！";
                            break;
                        case 'CLICK':
                            return "点击事件！";
                            break;
                        default:
                            return '收到其它事件';
                            break;
                    }
                    break;
                case 'text':
                    return '收到文字消息';
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
        });
        return $wechat->server->serve();
    }
}
