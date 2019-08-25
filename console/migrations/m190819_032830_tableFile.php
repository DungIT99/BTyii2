<?php

use yii\db\Migration;

/**
 * Class m190819_032830_tableFile
 */
class m190819_032830_tableFile extends Migration
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
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tableFile}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'file' => $this->string(),
          

        ], $tableOptions);

     
    }

    public function down()
    {
        $this->dropTable('{{%tableFile}}');
    }
}
