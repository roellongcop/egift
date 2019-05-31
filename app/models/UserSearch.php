<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;
use yii\helpers\ArrayHelper;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    public $pagination;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role_id'], 'integer'],
            [['username', 'email', 'password', 'user_type', 'access_token', 'auth_key', 'status', 'created_at', 'updated_at'], 'safe'],
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
    public function search($params , $type='merchants')
    {
        $query = User::find();

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
            'user_type' => $this->user_type,
            'role_id' => $this->role_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'access_token', $this->access_token])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['<>', 'status', 9]);


        if ($type == 'merchants') {
            $query->andFilterWhere(['user_type' => 8]);
        }
        else if($type == 'admin') {
            $query->andFilterWhere(['user_type' => 9]);
        }

        return $dataProvider;
    }



    public static function lists($user_type = "")
    {
        $user_type = $user_type === "" ? 8: $user_type;

        $records = User::find()
            ->alias('u')
            ->select(['u.id', 'p.name as profile_name'])
            ->where(['status' => 1, 'user_type' => $user_type])
            ->innerJoinWith('profile p')
            ->orderBy('profile_name', 'asc')
            ->all();

        $records = ArrayHelper::map($records, 'id' , 'profile_name');

        return $records;
    }

    public static function getMerchants()
    {
        $records = User::find()
            ->where(['user_type' => 1, 'status' => 1])
            ->limit(6)
            ->all();

        return $records;
    }

}
