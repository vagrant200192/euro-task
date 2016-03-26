<?php

use yii\db\Migration;

class m160324_123808_table_product_and_info extends Migration
{
    public function up()
    {
	    $tableOptions = null;
	    if ($this->db->driverName === "mysql"){
		    $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
	    }

	    $this->createTable('product', [
		    'id' => 'pk',
		    'title' => 'string NOT NULL',
	    ], $tableOptions);

	    $this->createTable('info', [
		    'id' => 'pk',
		    'comment' => 'text',
		    'rating' => 'integer',
		    'product_id' => 'integer',
		    'user_id' => 'integer',
	    ], $tableOptions);
    }

    public function down()
    {
		$this->dropTable('product');
	    $this->dropTable('info');
    }
}
