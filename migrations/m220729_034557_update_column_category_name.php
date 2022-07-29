<?php

use yii\db\Migration;

/**
 * Class m220729_034557_update_column_category_name
 */
class m220729_034557_update_column_category_name extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('Category','category_name', 'string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220729_034557_update_column_category_name cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220729_034557_update_column_category_name cannot be reverted.\n";

        return false;
    }
    */
}
