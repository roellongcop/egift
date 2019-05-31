<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%account_request}}".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $telephone_no
 * @property string $description
 * @property string $address
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class AccountRequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%account_request}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'telephone_no', 'description', 'address',], 'required'],
            [['description', 'address'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 191],
            [['telephone_no'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'telephone_no' => 'Telephone No',
            'description' => 'Description',
            'address' => 'Address',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
