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
            [['egift_id', 'status'], 'required'],
            [['egift_id'], 'integer'],
            [['date_used'], 'safe'],
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
            'date_used' => 'Date Used',
            'status' => 'Status',
        ];
    }
}
