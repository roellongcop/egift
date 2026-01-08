<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%egift_user}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $egift_id
 * @property double $orig_price
 * @property double $sale_price
 * @property int $to
 * @property int $status
 * @property string $updated_at
 * @property string $created_at
 */
class EgiftUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%egift_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'egift_id', 'orig_price', 'sale_price', 'status'], 'required'],
            [['user_id', 'egift_id', 'to', 'status'], 'integer'],
            [['orig_price', 'sale_price'], 'number'],
            [['updated_at', 'created_at'], 'safe'],
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
            'orig_price' => 'Orig Price',
            'sale_price' => 'Sale Price',
            'to' => 'To',
            'status' => 'Status',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    public function getEgift()
    {
        return $this->hasOne(Egift::className(), ['id' => 'egift_id']);
    }

    public function getToUser()
    {
        return $this->hasOne(User::className(), ['id' => 'to']);
    }

    public function getEgiftBranches()
    {
        return $this->hasMany(EgiftBranches::className(), ['egift_id' => 'egift_id']);
    }

    public function getBranches()
    {
        return $this->hasMany(Branches::className(), ['id' => 'branch_id'])->via('egiftBranches');
    }


}
