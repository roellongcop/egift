<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%point_management}}".
 *
 * @property int $id
 * @property int $point
 * @property int $benchmark
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class PointManagement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%point_management}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['point', 'benchmark',], 'required'],
            [['point', 'benchmark', 'status'], 'integer'],
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
            'point' => 'Point',
            'benchmark' => 'Benchmark',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
