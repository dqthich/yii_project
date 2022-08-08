<?php

use yii\db\Migration;

/**
 * Class m220808_095817_create_test_log
 */
class m220808_095817_create_test_log extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test_log}}', [
            'id' => $this->bigPrimaryKey(),
            'level' => $this->integer()->notNull()->comment('日志等级'),
            'category' => $this->string(100)->notNull()->comment('分类名称'),
            'prefix' => $this->text(),
            'route' => $this->string(100)->notNull()->comment('路由'),
            'method' => $this->string(20)->notNull()->comment('请求方式'),
            'app' => $this->string(20)->comment('请求应用'),
            'module' => $this->string(20)->comment('请求模块'),
            'request' => $this->text()->comment('请求参数'),
            'status' => $this->string(10)->notNull()->comment('状态码'),
            'message' => $this->text()->comment('日志内容'),
            'request_at' => $this->double()->notNull()->comment('请求时间'),
            'ip' => $this->string(63)->comment('请求IP'),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB COMMENT=\'请求日志表\'');
        //增加索引
        $this->createIndex('idx_log_level', '{{%test_log}}', 'level');
        $this->createIndex('idx_log_category', '{{%test_log}}', 'category');
        $this->createIndex('idx_log_route', '{{%test_log}}', 'route');
        $this->createIndex('idx_log_method', '{{%test_log}}', 'method');
        $this->createIndex('idx_log_status', '{{%test_log}}', 'status');
    }
    

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220808_095817_create_test_log cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220808_095817_create_test_log cannot be reverted.\n";

        return false;
    }
    */
}
