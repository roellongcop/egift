<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%branches}}`.
 */
class m190531_102514_create_branches_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if (Yii::$app->db->getTableSchema('{{%branches}}', true) === null) {
            $this->createTable('{{%branches}}', [
                'id' => $this->primaryKey(),
                'merchant_id' => $this->integer(11)->notNull(),
                'name' => $this->string(191)->notNull(),
                'description' => $this->text()->notNull(),
                'latitude' => $this->string(32)->notNull(),
                'longitude' => $this->string(32)->notNull(),
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
        $this->dropTable('{{%branches}}');
    }
}
