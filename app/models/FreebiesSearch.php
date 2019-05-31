<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use app\models\Freebies;

/**
 * FreebiesSearch represents the model behind the search form of `app\models\Freebies`.
 */
class FreebiesSearch extends Freebies
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'supplier_id', 'unit_id'], 'integer'],
            [['name', 'description', 'status', 'created_at', 'updated_at'], 'safe'],
            [['price', 'qty'], 'number'],
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
        $query = Freebies::find();

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
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'supplier_id' => $this->supplier_id,
            'unit_id' => $this->unit_id,
            'price' => $this->price,
            'qty' => $this->qty,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);


        if(Yii::$app->user->identity->user_type === 8) {
            $query->andFilterWhere(['user_id' => Yii::$app->user->identity->id]);
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['<>', 'status', 9]);

        return $dataProvider;
    }


    public static function lists($dropdown=true)
    {
        $records = Freebies::find()
            ->where(['status' => 0, 'user_id' => Yii::$app->user->identity->id])  
            ->orderBy(['name' => SORT_ASC])
            ->all();

        if ($dropdown === true) {
            $records = ArrayHelper::map($records, 'id', 'name');
        }

        return $records;
    }
}
