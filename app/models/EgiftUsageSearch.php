<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EgiftUsage;

/**
 * EgiftUsageSearch represents the model behind the search form of `app\models\EgiftUsage`.
 */
class EgiftUsageSearch extends EgiftUsage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'egift_id'], 'integer'],
            [['date_used', 'status'], 'safe'],
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
        $query = EgiftUsage::find();

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
            'date_used' => $this->date_used,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }


    public static function usage($year='')
    {
        $records = EgiftUsage::find()
            ->where(['status' => 1])
            ->andFilterWhere(['YEAR(created_at)' => $year])
            ->asArray()
            ->all();

        return $records;
    }
}
