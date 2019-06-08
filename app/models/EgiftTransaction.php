<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%egift_transaction}}".
 *
 * @property int $id
 * @property int $egift_id
 * @property int $transaction_id
 * @property int $quantity
 * @property double $price
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class EgiftTransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%egift_transaction}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['egift_id', 'transaction_id', 'quantity', 'orig_price', 'sale_price', 'status'], 'required'],
            [['egift_id', 'transaction_id', 'quantity', 'status'], 'integer'],
            [['sale_price', 'orig_price'], 'number'],
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
            'egift_id' => 'Egift ID',
            'transaction_id' => 'Transaction ID',
            'quantity' => 'Quantity',
            'orig_price' => 'Original Price',
            'sale_price' => 'Sale Price',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
