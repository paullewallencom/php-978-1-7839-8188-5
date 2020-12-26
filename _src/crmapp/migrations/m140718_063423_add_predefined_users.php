<?php

use yii\db\Schema;
use yii\db\Migration;

class m140718_063423_add_predefined_users extends Migration
{
    public function up()
    {
        foreach (
            [
                'JoeUser' => '7 wonder @ American soil',
                'AnnieManager' => 'Shiny 3 things hmm, vulnerable',
                'RobAdmin' => 'Imitate #14th symptom of apathy'
            ] as $username => $password
        ) {
            $user = new \app\models\user\UserRecord();
            $user->attributes = compact('username', 'password');
            $user->save();
        }
    }

    public function down()
    {
        $this->delete('user');
    }
}
