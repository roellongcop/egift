<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%price_variety}}".
 *
 * @property int $id
 * @property int $egift_id
 * @property double $orig_price
 * @property double $sale_price
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class PriceVariety extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%price_variety}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orig_price', 'sale_price'], 'required'],
            [['egift_id', 'user_id'], 'integer'],
            [['orig_price', 'sale_price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'string', 'max' => 9],
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
            'user_id' => 'User ID',
            'orig_price' => 'Original Price',
            'sale_price' => 'Sale Price',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getPercentage()
    {
        return 100 - (($this->sale_price / $this->orig_price )* 100); 
    }
}
