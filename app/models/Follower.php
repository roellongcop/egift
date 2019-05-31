<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%follower}}".
 *
 * @property int $id
 * @property int $merchant_id
 * @property int $user_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Follower extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%follower}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'user_id', 'status'], 'required'],
            [['merchant_id', 'user_id', 'status'], 'integer'],
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
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
