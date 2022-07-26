<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Wallet}}`.
 */
class m220726_042059_create_Wallet_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Wallet}}', [
            'wallet_id' => $this->primaryKey(),
            'balance' => $this->string(12)->notNull(),
            'id_account' => $this->integer()->notNull(),
            'description' => $this->text(),
        ]);
        // add foreign key for table `account`
        $this->addForeignKey(
            'fk-wallet-account_id',
            'Wallet',
            'id_account',
            'Account',
            'account_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Wallet}}');
    }
}
