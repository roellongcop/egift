<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DiscountSetting;

/**
 * DiscountSettingSearch represents the model behind the search form of `app\models\DiscountSetting`.
 */
class DiscountSettingSearch extends DiscountSetting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'merchant_id', 'status'], 'integer'],
            [['benchmark_amount', 'percentage_discount'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DiscountSetting::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'merchant_id' => $this->merchant_id,
            'benchmark_amount' => $this->benchmark_amount,
            'percentage_discount' => $this->percentage_discount,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['<>', 'status', 9]);
        

        return $dataProvider;
    }
}
