<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Icon;
use yii\helpers\ArrayHelper;

/**
 * IconSearch represents the model behind the search form of `app\models\Icon`.
 */
class IconSearch extends Icon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'status', 'created_at', 'updated_at'], 'safe'],
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
        $query = Icon::find();

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
            'status' => 0,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['<>', 'status', 9]);

        return $dataProvider;
    }


    public static function lists()
    {
        return Icon::find()
            ->where(['status' => 0])
            ->orderBy(['name' => SORT_ASC])
            ->all();
    }


    public static function dropDown($key = 'id')
    {
        $records = Icon::find()
            ->where(['status' => 0]) 
            ->orderBy('name', 'asc')
            ->all();

        $records = ArrayHelper::map($records, $key , 'name');

        return $records;
    }
}
