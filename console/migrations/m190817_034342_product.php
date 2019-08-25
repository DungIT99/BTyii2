<?php

use yii\db\Migration;

/**
 * Class m190817_034342_product
 */
class m190817_034342_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    public function up()
    { 
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            
        }

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'name' => $this->string(),
            'price' => $this->string(),

        ], $tableOptions);

        $this->addForeignKey(
            'fk-category_id-id',
            'product',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    } 

    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}



$customers = Customer::find()
->limit(10)
->orderBy(['id' => SORT_DESC]);
