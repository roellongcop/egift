<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bookmark}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $merchant_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Bookmark extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bookmark}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'merchant_id', 'status'], 'required'],
            [['user_id', 'merchant_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'string', 'max' => 1],
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
            'merchant_id' => 'Merchant ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
