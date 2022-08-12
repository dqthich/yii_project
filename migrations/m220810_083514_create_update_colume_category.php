<?php

use yii\db\Migration;

/**
 * Class m220810_083514_create_update_colume_category
 */
class m220810_083514_create_update_colume_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('Category','category_id', 'integer');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220810_083514_create_update_colume_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220810_083514_create_update_colume_category cannot be reverted.\n";

        return false;
    }
    */
}
