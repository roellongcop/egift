<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sales}}".
 *
 * @property int $id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $merchant_id
 * @property string $transaction_id
 * @property double $amount
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sales}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'merchant_id', 'transaction_id', 'amount'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['merchant_id', 'transaction_id', 'status'], 'integer'],
            [['amount'], 'number'],
            [['status'], 'default', 'value' => 1], 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'merchant_id' => 'Egift ID',
            'transaction_id' => 'Transaction ID',
            'amount' => 'Amount',
        ];
    }
}
