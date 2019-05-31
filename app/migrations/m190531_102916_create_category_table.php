<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m190531_102916_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if (Yii::$app->db->getTableSchema('{{%category}}', true) === null) {
            $this->createTable('{{%category}}', [
                'id' => $this->primaryKey(),
                'user_id' => $this->integer(11)->notNull(),
                'name' => $this->string(191)->notNull(),
                'description' => $this->text()->notNull(),
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
        $this->dropTable('{{%category}}');
    }
}
