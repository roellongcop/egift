<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PriceVariety;

/**
 * PriceVarietySearch represents the model behind the search form of `app\models\PriceVariety`.
 */
class PriceVarietySearch extends PriceVariety
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'egift_id', 'user_id'], 'integer'],
            [['orig_price', 'sale_price'], 'number'],
            [['status', 'created_at', 'updated_at'], 'safe'],
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
    public function search($params, $egift_id=0)
    {
        $this->egift_id = $egift_id;

        $query = PriceVariety::find();

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
            'egift_id' => $this->egift_id,
            'user_id' => $this->user_id,
            'orig_price' => $this->orig_price,
            'sale_price' => $this->sale_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

     

        if($this->egift_id == 0 && Yii::$app->user->identity->user_type === 1) {
            $query->andWhere(['user_id' => Yii::$app->user->identity->id]);
        }

        $query->andFilterWhere(['like', 'status', $this->status]);
        
        $query->orderBy(['id' => SORT_DESC]);

        return $dataProvider;
    }


    public function searchAll($params)
    {

        $query = PriceVariety::find();

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
            'egift_id' => $this->egift_id,
            'user_id' => $this->user_id,
            'orig_price' => $this->orig_price,
            'sale_price' => $this->sale_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

     

        if(Yii::$app->user->identity->user_type === 1) {
            $query->andWhere(['user_id' => Yii::$app->user->identity->id]);
        }

        $query->andFilterWhere(['like', 'status', $this->status]);
        
        $query->orderBy(['id' => SORT_DESC]);

        return $dataProvider;
    }
}
