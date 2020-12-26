<?php

use yii\db\Schema;
use yii\db\Migration;

class m140704_074257_init_customer_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'customer',
            [
                'id' => 'pk',
                'name' => 'string',
                'birth_date' => 'date',
                'notes' => 'text',
            ],
            'ENGINE=InnoDB'
        );

    }

    public function down()
    {
        $this->dropTable('customer');
    }
}
