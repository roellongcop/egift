<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $egift_id
 * @property int $quantity
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'egift_id', 'quantity', 'status'], 'required'],
            [['user_id', 'egift_id', 'quantity', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'egift_id' => 'Egift ID',
            'quantity' => 'Quantity',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
