<?php
/**
 * Created by PhpStorm.
 * User: Hijarian
 * Date: 03.08.14
 * Time: 15:25
 */

namespace app\utilities;

use app\models\user\UserRecord;
use yii\web\UrlRuleInterface;

class UsernameUrlRule implements UrlRuleInterface
{
    public function parseRequest($manager, $request)
    {
        $maybeUsername = $request->pathInfo;

        $user = UserRecord::findOne(['username' => $maybeUsername]);
        if (!$user)
            return false;

        $route = 'users/view';
        $params = ['id' => $user->id];
        return [$route, $params];
    }

    public function createUrl($manager, $route, $params)
    {
        if ($route !== 'users/view' || !array_key_exists('id', $params))
            return false;

        $user = UserRecord::findOne($params['id']);
        if (!$user)
            return false;

        return "{$user->username}";
    }
}
