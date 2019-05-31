<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%egift_freebies}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $egift_id
 * @property int $freebies_id
 * @property int $qty
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class EgiftFreebies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%egift_freebies}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'egift_id', 'freebies_id', 'qty',], 'required'],
            [['user_id', 'egift_id', 'freebies_id', 'qty'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer', 'max' => 9],
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
            'freebies_id' => 'Freebies ID',
            'qty' => 'Qty',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getFreebies()
    {
        return $this->hasOne(Freebies::className(), ['id' => 'freebies_id']);
    }
}
