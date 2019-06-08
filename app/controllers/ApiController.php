<?php

namespace app\controllers;

header('Access-Control-Allow-Origin: *');  
   
 header('Access-Control-Allow-Methods: GET,PUT,POST,DELETE,PATCH,OPTIONS');
 header('Access-Control-Allow-Headers: * , X-Requested-With, Content-Type, Accept, Authorization');
     
use Yii;
use app\models\LoginForm;
use app\models\User;
use app\models\Profile;
use app\models\EgiftSearch;
use app\models\ProfileSearch;
use app\models\Egift;
use app\models\NatureOfBusiness;
use app\models\EgiftBranches;
use app\models\Rating;
use app\models\Branches;
use app\models\EgiftUser;
use app\models\Transaction;
use app\models\EgiftTransaction;
use app\models\Sales;


class ApiController extends \yii\web\Controller
{   

    public $layout = 'plain';


    public function actions()
    {
        // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    }




    public function actionIndex()
    {
        return $this->render('index');
    }



    public function actionLogin()
    {

        $model = new LoginForm();

        if(Yii::$app->request->post())
        {
            $data = [];
            $data['LoginForm'] = Yii::$app->request->post();

            if ($model->load($data) && $model->login() ) 
            {
                return [ $model->_user->attributes ];
            }
            else
            {
                return false;
            }
        }

        return false;
    }



    public function actionCheckEmail()
    {
        $model = User::findOne(['email' => Yii::$app->request->post('email')]);

        if($model)
        {
            return true;
        }

        return false;
    }



    public function actionSignUp()
    {

        $model = new User();

        if(Yii::$app->request->post())
        {
            $data = [];

            $data['User'] = Yii::$app->request->post();

            if ($model->load($data)) 
            {     
                $model->username = $model->email;
                $model->role_id = 0;
                $model->password_repeat = $model->password;
                $model->status = 1;
                $model->user_type = 6;
                $model->setPassword();

                if ($model->save()) 
                {
                    return [ $model->attributes ];
                }

                return [$model->errors];
            }
        }

        return false;   
    }


    public function actionPopular()
    {
        $searchModel = new EgiftSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return [ $dataProvider->models ];
    }


  

    // roel

    public function actionSearchFriends()
    {
        $records = Profile::find()
            ->select(['*'])
            ->alias('p')
            ->where(['u.user_type' => 6])
            ->joinWith('user u')
            ->groupBy('u.id')
            ->asArray()
            ->all();

        return $records;
    }


    public function actionEgift($id = "")
    {
        if($id === "") 
        {
            $records = Egift::find()
            ->where(['status' => 1])
            ->with('profile')
            ->asArray()
            ->all();

            return $records;
        }

        $records = Egift::find()
            ->where(['id' => $id])
            ->asArray()
            ->one();

        return $records;
    }


    public function actionEgiftsByMerchant($merchant_id = "")
    {
        if($merchant_id === "") 
        {
            $egifts = Egift::find()
                ->where(['status' => 1])
                ->asArray()
                ->all();
        }
        else
        {
            $egifts = Egift::find()
            ->where(['status' => 1, 'merchant_id' => $merchant_id])
            ->asArray()
            ->all();
        }


        if($egifts)
        {
            foreach ($egifts as &$egift) 
            {
                $egift['branches'] = $this->actionBranchesByEgift($egift['id']);
            }
        }

        return $egifts;
    }   

    public function actionBranchesByEgift($egift_id='')
    {
        $branches = EgiftBranches::find()
            ->with('branches')
            ->where(['egift_id' => $egift_id])
            ->asArray()
            ->all();

        return $branches ? $branches: [];
    }


    public function actionCategories($id = "")
    {
            
        if ($id === "") 
        {
            $records = NatureOfBusiness::find()
                ->where(['status' => 0])
                ->asArray()
                ->all();

            return $records;
        }


        $records = NatureOfBusiness::find()
            ->where(['id' => $id])
            ->asArray()
            ->one();

        return $records;
    }



    


    public function actionMerchant($id = "")
    {

        if($id === "") 
        {
            $records = Profile::find()
                ->select(['*'])
                ->alias('p')
                ->where(['u.user_type' => 8])
                ->joinWith('user u')
                ->groupBy('u.id')
                ->asArray()
                ->all();

            foreach ($records as &$rec) 
            {
                $rec['ratings']  = $this->actionRatingByMerchant($rec['id']);
                $rec['egifts']   = $this->actionEgiftsByMerchant($rec['id']);
                $rec['branches'] = $this->actionBranches($rec['id']);
            }

           // print_r($records); exit();
            return $records;
        }

        $records = Profile::find()
            ->select(['*'])
            ->alias('p')
            ->where(['u.id'=> $id])
            ->joinWith('user u')
            ->groupBy('u.id')
            ->asArray()
            ->one();


            $records['ratings']  = $this->actionRatingByMerchant($records['id']);
            $records['egifts']   = $this->actionEgiftsByMerchant($records['id']);
            $records['branches'] = $this->actionBranches($records['id']);
         
        
       // print_r($records); exit();
        return $records;
    }


    public function actionRatingByMerchant($merchant_id="")
    {
        $ratings = Rating::find()
            ->where(['merchant_id' => $merchant_id])
            ->asArray()
            ->all();

        return $ratings;
    }
    
    
    

    
    public function actionBranches($id="")
    {
       if($id === "")
       {
            $records = Branches::find()
            ->asArray()
            ->all();
        
            return $records;
       } 
      
      
        $records = Branches::find()
            ->where(['merchant_id' => $id])
            ->asArray()
            ->all();
        
            return $records;
    }





    /*============================================================
    PATCH-2019-06-08
    ============================================================*/



    public function actionEgiftUser($from="", $to="")
    {
        
        $egift_users = EgiftUser::find()
            ->with('egift')
            ->where(['status' => 1, 'user_id' => $from ])
            ->asArray()
            ->all();

        foreach ($egift_users as &$egift_user) 
        {
            $egift_user['egift']['branches'] = EgiftBranches::find()
                ->with('branches')
                ->where(['egift_id' => $egift_user['egift_id']])
                ->asArray()
                ->all();


            if ($to) {
                $egift_user['to_user'] = User::find()
                    ->with('profile')
                    ->where(['id' => $to])
                    ->asArray()
                    ->one();
            }
        }

        return $egift_users;
    }



    public function actionUpdateStock($egift_id="", $quantity="")
    {
        $egift = Egift::findOne($egift_id);
        $egift->stock = $egift->stock - $quantity;

        if ($egift->save()) {

            $model = Egift::find($egift_id)
                ->asArray()
                ->one();

            return $model;
        }
    }


    public function actionSaveTransaction()
    {

        // =================================
        // SAMPLE DATA
        // $post = [
        //     'user_id' => 1,
        //     'egift' => [
        //         [
        //             'egift_id' => 1,
        //             'merchant_id' => 1,
        //             'orig_price' => 100,
        //             'sale_price' => 100,
        //             'quantity' => 10,
        //             'status' => 1,
        //             'to' => ''
        //         ],
        //         [
        //             'egift_id' => 2,
        //             'merchant_id' => 2,
        //             'orig_price' => 100,
        //             'sale_price' => 100,
        //             'quantity' => 20,
        //             'status' => 2,
        //             'to' => 2
        //         ]
        //     ]
        // ];
        // =================================

        $post = Yii::$app->request->post();
        $transaction_no = 'er'. time();

        $transaction = new Transaction();
        $transaction->transaction_no = $transaction_no;
        $transaction->user_id = $post['user_id'];

        if ($transaction->save()) {
            foreach ($post['egift'] as $egift) 
            {
                $this->saveEgiftTransaction($egift, $transaction->id);
                $this->saveEgiftUser($egift, $post['user_id']);
                $this->saveSales($egift, $transaction->id);
            }

            
        }
    }

    public function saveSales($post, $transaction_id)
    {
        $sales = new Sales();
        $sales->merchant_id = $post['merchant_id'];
        $sales->transaction_id = $transaction_id;
        $sales->amount = $post['orig_price'];
        $sales->status = 1;

        return $sales->save();
    }


    public function saveEgiftTransaction($post, $transaction_id)
    {
        $model = new EgiftTransaction();
        $model->egift_id = $post['egift_id'];
        $model->transaction_id = $transaction_id;
        $model->orig_price = $post['orig_price'];
        $model->sale_price = $post['sale_price'];
        $model->quantity = $post['quantity'];
        $model->status = $post['status'];

        return $model->save();
    }

    public function saveEgiftUser($post, $user_id)
    {
        $egift = new EgiftUser();
        $egift->egift_id = $post['egift_id'];
        $egift->user_id = $user_id;
        $egift->orig_price = $post['orig_price'];
        $egift->sale_price = $post['sale_price'];
        $egift->to = ($post['to']) ? $post['to']: 0;
        $egift->status = $post['status'];

        return $egift->save();
    }



}
