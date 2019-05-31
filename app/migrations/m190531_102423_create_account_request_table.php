<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%account_request}}`.
 */
class m190531_102423_create_account_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if (Yii::$app->db->getTableSchema('{{%account_request}}', true) === null) {
            $this->createTable('{{%account_request}}', [
                'id' => $this->primaryKey(),
                'name' => $this->string(191)->notNull(),
                'email' => $this->string(191)->notNull(),
                'telephone_no' => $this->string(20)->notNull(),
                'description' => $this->text()->notNull(),
                'address' => $this->text()->notNull(),
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
        $this->dropTable('{{%account_request}}');
    }
}
