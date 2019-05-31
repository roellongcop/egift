<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%about1}}`.
 */
class m190531_100913_create_about1_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%about1}}', [
            'id' => $this->primaryKey(),
            'logo' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'address' => $this->text()->notNull(),
            'mission' => $this->text()->notNull(),
            'vision' => $this->text()->notNull(),
            'history' => $this->text()->notNull(),
            'email' => $this->string(191)->notNull(),
            'contact_no' => $this->string(191)->notNull(),
            'facebook' => $this->string(191)->notNull(),
            'twitter' => $this->string(191)->notNull(),
            'instagram' => $this->string(191)->notNull(),
            'yahoo' => $this->string(191)->notNull(),
            'terms_and_condition' => $this->text()->notNull(),
            'privacy_policy' => $this->text()->notNull(),
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
        $this->dropTable('{{%about1}}');
    }
}
