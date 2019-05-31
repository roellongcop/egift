<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%nature_of_business}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class NatureOfBusiness extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%nature_of_business}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description','icon_id',], 'required'],
            [['icon_id', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 128],
            [['status'], 'number', 'max' => 9],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Merchant',
            'name' => 'Name',
            'icon_id' => 'Icon Name',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getMerchant_name()
    {
        return $this->user->profile->_name;
    }


    public function get_name()
    {
        return ucwords($this->name);
    }


    public function get_description()
    {
        return ucfirst($this->description);
    }



    public function get_created_at()
    {
        return date('F d, Y', strtotime($this->created_at));
    }


    public function get_updated_at()
    {
        return date('F d, Y', strtotime($this->updated_at));
    }

    public function getIcon()
    {
        return $this->hasOne(Icon::className(), ['id' => 'icon_id']);
    }

    public function get_icon()
    {
       return '<i class="'.$this->icon->name.'"></i>';
    }
}
