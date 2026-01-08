<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%egift_usage}}".
 *
 * @property int $id
 * @property int $egift_id
 * @property string $date_used
 * @property int $status
 */
class EgiftUsage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%egift_usage}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['egift_id', 'status', 'user_id'], 'required'],
            [['egift_id', 'user_id'], 'integer'],
            [['created_at'], 'safe'],
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
            'egift_id' => 'Egift ID',
            'user_id' => 'User ID',
            'created_at' => 'Date Used',
            'status' => 'Status',
        ];
    }
}
