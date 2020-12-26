<?php

use yii\db\Schema;
use yii\db\Migration;

class m140803_051656_add_email_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'email',
            [
                'id' => 'pk',
                'purpose' => 'string',
                'address' => 'string',
                'customer_id' => 'int not null'
            ]
        );
        $this->addForeignKey('customer_email', 'email', 'customer_id', 'customer', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('customer_email', 'email');
        $this->dropTable('email');
    }
}
