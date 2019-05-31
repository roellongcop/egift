<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Role;
use yii\helpers\ArrayHelper;

/**
 * RoleSearch represents the model behind the search form of `app\models\Role`.
 */
class RoleSearch extends Role
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['access', 'created_at', 'updated_at', 'name'], 'safe'],
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
        $query = Role::find();

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
            'name' => $this->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'access', $this->access])
            ->andFilterWhere(['<>', 'status',9]);
        

        return $dataProvider;
    }


    public static function lists($dropdown = true)
    {
        $records = Role::find()
            ->where(['status' => 0])
            ->orderBy(['name' => SORT_ASC])
            ->all();

        if ($dropdown === true) {
            $records = ArrayHelper::map($records, 'id', 'name');
        }

        return $records;
    }

    public static function merchant()
    {
        $role = Role::find()
            ->where(['name' => 'merchant', 'status' => 0])
            ->one();

        if($role) {
            return $role->id;
        }

        return 0;
    }
}
