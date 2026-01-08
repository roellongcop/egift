<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Egift;
use yii\helpers\ArrayHelper;

/**
 * EgiftSearch represents the model behind the search form of `app\models\Egift`.
 */
class EgiftSearch extends Egift
{
    public $pageSize = 10;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'merchant_id', 'category_id', 'pageSize'], 'integer'],
            [['name', 'description', 'stock', 'referral_code', 'image', 'status', 'created_at', 'updated_at', 'promo'], 'safe'],
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
        $query = Egift::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => isset($this->pageSize)? $this->pageSize: 10
            ]
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
            'promo' => $this->promo,
            'merchant_id' => $this->merchant_id,
            'category_id' => $this->category_id,
            'stock' => $this->stock,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'referral_code', $this->referral_code])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['<>', 'status', 9]);

        if(Yii::$app->user->identity->user_type === 8) {
            $query->andFilterWhere(['merchant_id' => Yii::$app->user->identity->id]);
        }

        return $dataProvider;
    }

    public static function lists($obj = false)
    {
        $records = Egift::find()
            ->where([
                'status' => 0, 
                'merchant_id' => Yii::$app->user->identity->id
            ]) 
            ->orderBy('name', 'asc')
            ->all();

        if ($obj === false) {
            $records = ArrayHelper::map($records, 'id' , 'name');
        }


        return $records;

    }

    public static function byMerchant($merchant_id='')
    {
        $model = Egift::findAll(['merchant_id' => $merchant_id]);

        return $model;
    }

    public static function creation($year='')
    {
        $records = Egift::find()
            ->andFilterWhere(['YEAR(created_at)' => $year])
            ->asArray()
            ->all();

        return $records;
    }

    public static function approved()
    {
        $records = Egift::find()
            ->where(['status' => 1])
            ->asArray()
            ->all();

        return $records;
    }

    public static function for_approval()
    {
        $records = Egift::find()
            ->where(['status' => 0])
            ->asArray()
            ->all();

        return $records;
    }

    

}
