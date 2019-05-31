<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%rating}}".
 *
 * @property int $id
 * @property int $merchant_id
 * @property int $user_id
 * @property int $rate
 * @property string $message
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%rating}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'user_id', 'rate', 'message', 'status'], 'required'],
            [['merchant_id', 'user_id', 'rate', 'status'], 'integer'],
            [['message'], 'string'],
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
            'merchant_id' => 'Merchant ID',
            'user_id' => 'User ID',
            'rate' => 'Rate',
            'message' => 'Message',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
