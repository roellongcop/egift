<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%branches}}".
 *
 * @property int $id
 * @property int $merchant_id
 * @property string $name
 * @property string $description
 * @property string $latitude
 * @property string $longitude
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%branches}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'name', 'description', 'latitude', 'longitude'], 'required'],
            [['merchant_id'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 191],
            [['latitude', 'longitude'], 'string', 'max' => 32],
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
            'merchant_id' => 'Merchant',
            'name' => 'Name',
            'description' => 'Description',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function get_name()
    {
        return ucwords($this->name);
    }

    public function get_description()
    {
        return ucfirst($this->description);
    }

    public function get_status()
    {
        return Yii::$app->params['branch_status'][$this->status];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'merchant_id']);
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id'])->via('user');
    }


}
