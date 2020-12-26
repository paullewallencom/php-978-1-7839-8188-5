<?php

use yii\db\Schema;
use yii\db\Migration;

class m140728_132154_add_audit_fields_to_customer extends Migration
{
    public function up()
    {
        $this->addColumn('customer', 'created_at', 'integer');
        $this->addColumn('customer', 'created_by', 'integer');
        $this->addColumn('customer', 'updated_at', 'integer');
        $this->addColumn('customer', 'updated_by', 'integer');

        $this->addForeignKey('customer_created_by', 'customer', 'created_by', 'user', 'id');
        $this->addForeignKey('customer_updated_by', 'customer', 'updated_by', 'user', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('customer_updated_by', 'customer');
        $this->dropForeignKey('customer_created_by', 'customer');

        $this->dropColumn('customer', 'updated_by');
        $this->dropColumn('customer', 'updated_at');
        $this->dropColumn('customer', 'created_by');
        $this->dropColumn('customer', 'created_at');
    }
}
