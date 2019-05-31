<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%discount_setting}}".
 *
 * @property int $id
 * @property int $merchant_id
 * @property double $benchmark_amount
 * @property double $percentage_discount
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class DiscountSetting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%discount_setting}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'benchmark_amount', 'percentage_discount',], 'required'],
            [['merchant_id', 'status'], 'integer'],
            [['benchmark_amount', 'percentage_discount'], 'number'],
            [['percentage_discount'], 'number', 'max' => 100],
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
            'merchant_id' => 'Merchant Name',
            'benchmark_amount' => 'Benchmark Amount (Php)',
            'percentage_discount' => 'Percentage Discount (%)',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'merchant_id']);
    }
}
