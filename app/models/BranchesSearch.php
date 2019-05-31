<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Branches;
use yii\helpers\ArrayHelper;

/**
 * BranchesSearch represents the model behind the search form of `app\models\Branches`.
 */
class BranchesSearch extends Branches
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'merchant_id', 'status'], 'integer'],
            [['name', 'description', 'latitude', 'longitude', 'created_at', 'updated_at'], 'safe'],
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
        $query = Branches::find();

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
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        if(Yii::$app->user->identity->user_type === 8) {
            $query->andFilterWhere(['merchant_id' => Yii::$app->user->identity->id]);
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['<>', 'status',9]);

        return $dataProvider;
    }


    public static function lists($dropdown=true)
    {
        $where = (Yii::$app->user->identity->user_type == 9) ? ['<>', 'merchant_id', Yii::$app->user->identity->id]: ['merchant_id' => Yii::$app->user->identity->id];


        $records = Branches::find()
            ->where(['status' => 0])
            ->andwhere($where)
            ->orderBy(['name' => SORT_ASC])
            ->all();



        if ($dropdown === true) {
            $records = ArrayHelper::map($records, 'id', 'name');
        }

        return $records;
    }


    public static function byBulkID($ids=[])
    {
       $records = Branches::find()
            ->where(['in', 'id', $ids])
            ->all();

        return $records;
    }
}
