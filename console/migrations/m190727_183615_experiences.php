<?php

use yii\db\Migration;

/**
 * Class m190727_183615_experiences
 */
class m190727_183615_experiences extends Migration
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

        $this->createTable('{{%experiences}}', [
            'id' => $this->primaryKey(),
            'userId' => $this->integer()->notNull(),
            'start_at' => $this->string()->notNull(),
            'end_at' => $this->string()->notNull(),
            'namecompany' => $this->string()->notNull(),
            'aboutjob' => $this->string()->notNull(),

            
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%experiences}}');
    }
}
