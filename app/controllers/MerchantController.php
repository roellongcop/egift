<?php

namespace app\controllers;

use Yii;
use app\models\RoleSearch;
use app\models\Profile;
use app\models\ProfileSearch;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class MerchantController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->permission->getAccess();
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'merchants');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $id = ($id === '') ? Yii::$app->user->identity->profile->id: $id;

        $model = $this->findModel($id);
        
        return $this->render('view', [
            'model' => $model
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Profile();
        $model->scenario = 'create';
        $user = new User();

        $user->password = Yii::$app->security->generateRandomString(10);
        $user->password_repeat = $user->password;
        $user->username = $user->createUsername();
        $user->role_id = RoleSearch::merchant();
        $user->user_type = 8;

        if (
            $model->load(Yii::$app->request->post()) && 
            $user->load(Yii::$app->request->post()) && 
            $user->validate() &&
            $model->validate()
        ) {

            $user->status = $model->authorized;

            $user->save();

            $uploadPath = Yii::$app->template->createFolder(['uploads', 'merchant']); 

            $model->logo_input = UploadedFile::getInstance($model, 'logo_input');
            $model->logo_banner_input = UploadedFile::getInstance($model, 'logo_banner_input');
            $model->user_id = $user->id;
            $model->upload($uploadPath);


            $model->save();


            // $mail = Yii::$app->mailer->compose('authorization', [
            //     'model' => $user 
            // ])
            // ->setFrom(['carmonahmo@gmail.com' => 'Egift Rewards'])
            // ->setTo($user->email)
            // ->setSubject('Merchant | Registration') 
            // ->send();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id='')
    {
        $id = ($id === '') ? Yii::$app->user->identity->profile->id: $id;

        $model = $this->findModel($id);
 

        $user = User::findOne($model->user_id);
        $model->authorized = $user->status;
        
        if (
            $model->load(Yii::$app->request->post()) && 
            $user->load(Yii::$app->request->post()) && 
            $user->validate() &&
            $model->validate()
        ) {
            $user->status = $model->authorized;
            $model->nature_of_business = isset(Yii::$app->request->post()['Profile']['nature_of_business'])? json_encode($model->nature_of_business): '';
            $user->save();
            

            $uploadPath = Yii::$app->template->createFolder(['uploads', 'merchant']); 
            $model->logo_input = UploadedFile::getInstance($model, 'logo_input');
            $model->logo_banner_input = UploadedFile::getInstance($model, 'logo_banner_input');
            $model->upload($uploadPath);

            if ($model->save()) {
                $user = User::findOne($model->user_id);
                if ($user->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }


        return $this->render('update', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        $id = $this->findModel(Yii::$app->request->post('id'))->user_id;

        $model = User::findOne($id);
        $model->status = 9; //deleted
        
        return $model->save();
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    protected function findUser($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    public function actionAddToBlocklist($user_id="")
    {

        $model = $this->findUser($user_id);

        $model->status = 2;

        if($model->save()) {
            return $this->redirect(['merchant/index']);
        }

        return ;
    }

    public function actionSetToAuthorized($user_id="")
    {
        $model = $this->findUser($user_id);

        $model->status = 1;

        if($model->save()) {
            return $this->redirect(['merchant/index']);
        }

        return ;
    }


    public function actionSetToUnauthorized($user_id="")
    {
        $model = $this->findUser($user_id);

        $model->status = 0;

        if($model->save()) {
            return $this->redirect(['merchant/index']);
        }

        return ;
    }

    public function actionStatistics()
    {
        return 'actionStatistics';
    }
}
