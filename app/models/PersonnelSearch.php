<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Personnel;

/**
 * PersonnelSearch represents the model behind the search form of `app\models\Personnel`.
 */
class PersonnelSearch extends Personnel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['fullname', 'company_name', 'position', 'self_description', 'inspiring_message', 'status', 'created_at', 'updated_at'], 'safe'],
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
        $query = Personnel::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'self_description', $this->self_description])
            ->andFilterWhere(['like', 'inspiring_message', $this->inspiring_message])
            ->andFilterWhere(['<>', 'status',9]);

        return $dataProvider;
    }


    public static function lists($limit = 3)
    {
        $records = Personnel::find()
            ->where(['status' => 0])
            ->limit($limit)
            ->all();

        return $records;
    }
}
