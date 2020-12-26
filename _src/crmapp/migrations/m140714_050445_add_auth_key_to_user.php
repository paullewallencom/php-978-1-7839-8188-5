<?php

use yii\db\Schema;
use yii\db\Migration;

class m140714_050445_add_auth_key_to_user extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'auth_key', 'string UNIQUE');
    }

    public function down()
    {
        $this->dropColumn('user', 'auth_key');
    }
}
