<?php

use yii\db\Migration;

/**
 * Handles the creation of table `egift_user`.
 */
class m190608_035950_create_egift_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%egift_user}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'egift_id' => $this->integer(11)->notNull(),
            'orig_price' => $this->float(2)->notNull(),
            'sale_price' => $this->float(2)->notNull(),
            'to' => $this->integer(11)->notNull(),
            'status' => $this->integer(1)->notNull(),
            'updated_at' => $this->timestamp()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%egift_user}}');
    }
}
