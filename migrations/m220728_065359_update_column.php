<?php

use yii\db\Migration;

/**
 * Class m220728_065359_update_column
 */
class m220728_065359_update_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('Account','account_name', 'string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220728_065359_update_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220728_065359_update_column cannot be reverted.\n";

        return false;
    }
    */
}
