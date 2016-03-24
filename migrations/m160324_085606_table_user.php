<?php

use yii\db\Migration;

class m160324_085606_table_user extends Migration
{
    public function up()
    {
	    $tableOptions = null;
	    if ($this->db->driverName === "mysql"){
		    $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
	    }

		$this->createTable('user', [
			'id' => 'pk',
			'username' => 'string NOT NULL',
			'password' => 'string NOT NULL',
		], $tableOptions);
    }

    public function down()
    {
		$this->dropTable('user');
    }
}
