<?php

use yii\db\Schema;
use yii\db\Migration;

class m140713_053357_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'user',
            [
                'id' => 'pk',
                'username' => 'string UNIQUE',
                'password' => 'string'
            ]
        );
    }

    public function down()
    {
        $this->dropTable('user');
    }

}
