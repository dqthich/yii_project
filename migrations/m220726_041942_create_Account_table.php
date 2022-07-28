<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Account}}`.
 */
class m220726_041942_create_Account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Account}}', [
            'account_id' => $this->primaryKey(),
            'account_name' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'avatar' => $this->string(),
            'register' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Account}}');
    }
}
