<?php

use yii\db\Schema;
use yii\db\Migration;

class m140710_083424_init_services_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'service',
            [
                'id' => 'pk',
                'name' => 'string unique',
                'hourly_rate' => 'integer',
            ]
        );
    }

    public function down()
    {
        $this->dropTable('service');
    }
}
