<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%supplier}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $address
 * @property string $contact_no
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%supplier}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'address', 'contact_no'], 'required'],
            [['user_id'], 'integer'],
            [['description', 'address'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 256],
            [['contact_no'], 'string', 'max' => 32],
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
            'name' => 'Name',
            'description' => 'Description',
            'address' => 'Address',
            'contact_no' => 'Contact No',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function get_address()
    {
        return ucfirst($this->address);
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
        return date("F d, Y H:i A", strtotime($this->created_at));
    }

    public function get_updated_at()
    {
        return date("F d, Y H:i A", strtotime($this->updated_at));
    }

}
