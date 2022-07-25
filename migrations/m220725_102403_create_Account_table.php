<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Account}}`.
 */
class m220725_102403_create_Account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Account}}', [
            'account_id' => $this->primaryKey(),
            'account_name' => $this->string(),
            'email' => $this->$this->string(),
            'avatar' => $this->string(),
            'password' => $this->string(),
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
