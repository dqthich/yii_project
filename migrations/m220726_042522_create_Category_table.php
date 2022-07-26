<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Category}}`.
 */
class m220726_042522_create_Category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Category}}', [
            'category_id' => $this->primaryKey(),
            'category_name' => $this->string(12)->notNull(),
            'type' => $this->boolean()->notNull(),
            'account_id' => $this->integer()->notNull(),

            
        ]);
        // add foreign key for table `account`
        $this->addForeignKey(
            'fk-category-account_id',
            'Category',
            'account_id',
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
        $this->dropTable('{{%Category}}');
    }
}
