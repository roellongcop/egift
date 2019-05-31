<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\About;

/**
 * AboutSearch represents the model behind the search form of `app\models\About`.
 */
class AboutSearch extends About
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['logo', 'description', 'address', 'mission', 'vision', 'history', 'email', 'contact_no', 'facebook', 'twitter', 'instagram', 'yahoo', 'status', 'created_at', 'updated_at'], 'safe'],
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
        $query = About::find();

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

        $query->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'mission', $this->mission])
            ->andFilterWhere(['like', 'vision', $this->vision])
            ->andFilterWhere(['like', 'history', $this->history])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'contact_no', $this->contact_no])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'twitter', $this->twitter])
            ->andFilterWhere(['like', 'instagram', $this->instagram])
            ->andFilterWhere(['like', 'yahoo', $this->yahoo])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }

    public static function information()
    {
        return About::findOne(['status' => 0]);
    }
}
