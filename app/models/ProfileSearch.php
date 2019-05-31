<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Profile;

/**
 * ProfileSearch represents the model behind the search form of `app\models\Profile`.
 */
class ProfileSearch extends Profile
{
    public $user_status;
    public $email;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'user_status'], 'integer'],
            [['name', 'description', 'tel_no', 'address', 'logo', 'allowed_egifts', 'nature_of_business', 'created_at', 'updated_at','email'], 'safe'],
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
    public function search($params, $user_type='merchants')
    { 
        $query = Profile::find()->alias('p');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['email'] = [
            'asc' => ['u.email' => SORT_ASC],
            'desc' => ['u.email' => SORT_DESC]
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        // grid filtering conditions
        $query->andFilterWhere([
            'p.id' => $this->id,
            'p.user_id' => $this->user_id,
            'p.created_at' => $this->created_at,
            'p.updated_at' => $this->updated_at,
            'u.status' => $this->user_status,
        ]);

        $query->andFilterWhere(['like', 'p.name', $this->name])
            ->andFilterWhere(['like', 'u.email', $this->email])
            ->andFilterWhere(['like', 'p.description', $this->description])
            ->andFilterWhere(['like', 'p.tel_no', $this->tel_no])
            ->andFilterWhere(['like', 'p.address', $this->address])
            ->andFilterWhere(['like', 'p.logo', $this->logo])
            ->andFilterWhere(['like', 'u.status', $this->user_status])
            ->andFilterWhere(['<>', 'u.status',9]);

       
        if ($user_type == 'merchants') {
            
            $query->andFilterWhere(['u.user_type' => 8]);
        }
        else if ($user_type == 'admin') {
            $query->andFilterWhere(['u.user_type' => 9]);
        }
        else if ($user_type == 'corporate') {
            $query->andFilterWhere(['u.user_type' => 7]);
        }
        else if ($user_type == 'customer') {
            $query->andFilterWhere(['u.user_type' => 6]);
        }

        $query->innerJoinWith('user u');

        

        return $dataProvider;
    }




    
}
