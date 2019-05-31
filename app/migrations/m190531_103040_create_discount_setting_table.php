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
        if (Yii::$app->db->getTableSchema('{{%discount_setting1}}', true) === null) {
            $this->createTable('{{%discount_setting1}}', [
                'id' => $this->primaryKey(),
                'merchant_id' => $this->integer(11)->notNull(),
                'benchmark_amount' => $this->float(10, 2)->notNull(),
                'percentage_amount' => $this->float(10, 2)->notNull(),
                'status' => $this->integer(1)->notNull(),
                'updated_at' => $this->timestamp()->notNull(),
                'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%discount_setting1}}');
    }
}
