<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%discount_setting}}`.
 */
class m190531_103040_create_discount_setting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->createTable('{{%discount_setting}}', [
                'id' => $this->primaryKey(),
                'merchant_id' => $this->integer(11)->notNull(),
                'benchmark_amount' => $this->float(2)->notNull(),
                'percentage_amount' => $this->float(2)->notNull(),
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
            $this->dropTable('{{%discount_setting}}');
    }
}
