<?php

use yii\db\Migration;

/**
 * Class m190727_171053_content
 */
class m190727_171053_content extends Migration
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

        $this->createTable('{{%content}}', [
            'id' => $this->primaryKey(),
            'userId' => $this->integer()->notNull(),
            'file' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%content}}');
    }
}
