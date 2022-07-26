<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Transaction}}`.
 */
class m220726_061400_create_Transaction_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Transaction}}', [
            'transaction_id' => $this->primaryKey(),
            'payment' => $this->string()->notNull(),
            'wallet_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'date' =>$this->date(),

        ]);
        // add foreign key for table `account`
        $this->addForeignKey(
            'fk-transaction-category_id',
            'Transaction',
            'category_id',
            'Category',
            'category_id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-transaction-wallet_id',
            'Transaction',
            'wallet_id',
            'Wallet',
            'wallet_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Transaction}}');
    }
}
