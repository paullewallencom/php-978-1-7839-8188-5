<?php
namespace app\commands;

use yii\console\Controller;
use yii\helpers\Console;
use Yii;

class HashController extends Controller
{
    public function actionIndex($string)
    {
        if ($this->interactive)
            Console::output(sprintf('Input string was: %s', $string));

        Console::output(Yii::$app->security->generatePasswordHash($string));
    }
}
