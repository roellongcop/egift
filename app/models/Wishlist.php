<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%wishlist}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $egift_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Wishlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wishlist}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'egift_id', 'status'], 'required'],
            [['user_id', 'egift_id'], 'integer'],
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
            'egift_id' => 'Egift ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
