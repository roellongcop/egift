<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use app\models\NatureOfBusiness;

/**
 * NatureOfBusinessSearch represents the model behind the search form of `app\models\NatureOfBusiness`.
 */
class NatureOfBusinessSearch extends NatureOfBusiness
{

    public $merchant_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['name', 'description', 'status', 'created_at', 'updated_at', 'merchant_name'], 'safe'],
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
        $query = NatureOfBusiness::find()
            ->alias('n');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $dataProvider->sort->attributes['merchant_name'] = [
            'asc' => ['p.name' => SORT_ASC],
            'desc' => ['p.name' => SORT_DESC]
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'n.id' => $this->id,
            'n.created_at' => $this->created_at,
            'n.updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'n.name', $this->name])
            ->andFilterWhere(['like', 'n.description', $this->description])
            ->andFilterWhere(['like', 'n.status', $this->status])
            ->andFilterWhere(['like', 'p.name', $this->merchant_name])
            ->andFilterWhere(['<>', 'n.status',9]);



        $user = Yii::$app->user->identity;

        if ($user->user_type == 8) {
            $query->andWhere(['n.user_id' => $user->id]);
        }

        $query->innerJoinWith('user u');
        $query->innerJoin('{{%profile}} p', 'p.user_id = u.id');

        return $dataProvider;
    }


    public static function lists($dropdown=true, $limit=null)
    {
        $records = NatureOfBusiness::find()
            ->where(['status' => 0])
            ->orderBy(['name' => SORT_ASC])
            ->limit($limit)
            ->all();

        if ($dropdown === true) {
            $records = ArrayHelper::map($records, 'id', 'name');
        }

        return $records;
    }



    public static function byProfile($ids=[])
    {
        if($ids == null) {
            return [];
        }

        $records = NatureOfBusiness::find()
            ->where(['in', 'id', $ids])
            ->all();

        return $records;
    }



 
}
