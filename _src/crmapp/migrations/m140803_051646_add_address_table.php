<?php

use yii\db\Schema;
use yii\db\Migration;

class m140803_051646_add_address_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'address',
            [
                'id' => 'pk',
                'purpose' => 'string',
                'country' => 'string',
                'state' => 'string',
                'city' => 'string',
                'street' => 'string',
                'building' => 'string',
                'apartment' => 'string',
                'receiver_name' => 'string',
                'postal_code' => 'string',
                'customer_id' => 'int not null'
            ]
        );
        $this->addForeignKey('customer_address', 'address', 'customer_id', 'customer', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('customer_address', 'address');
        $this->dropTable('address');
    }
}
