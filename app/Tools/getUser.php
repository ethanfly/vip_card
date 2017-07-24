<?php
/**
 * Created by PhpStorm.
 * User: ethan
 * Date: 2017/7/4
 * Time: 1:00
 */

function getUser()
{
    $uesr = session('wechat.oauth_user');
    $openid = $uesr->id;
    $sql = \App\User::where('openid', $openid);
    if ($sql->count() > 0) {
        $user = $sql->first();
    } else {
        $user = \App\User::create(array_except(session('wechat.oauth_user')->original, ['privilege', 'language']));
    }
    return $user;
}