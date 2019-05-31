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
 * @property int $egift_id
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
            [['status', 'egift_id', 'transaction_id', 'amount'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['egift_id'], 'integer'],
            [['amount'], 'number'],
            [['status'], 'string', 'max' => 1],
            [['transaction_id'], 'string', 'max' => 32],
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
            'egift_id' => 'Egift ID',
            'transaction_id' => 'Transaction ID',
            'amount' => 'Amount',
        ];
    }
}
