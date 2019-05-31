<?php

namespace app\controllers;

use Yii;
use app\models\Profile;
use app\models\User;
use app\models\UserSearch;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->permission->getAccess();
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'admin');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->setPassword();
            $model->password_repeat = $model->password;
            $model->user_type = 9;
            $model->save();

            $profile = new Profile();
            $profile->name = Yii::$app->security->generateRandomString(10);
            $profile->description = Yii::$app->security->generateRandomString(10);
            $profile->tel_no = Yii::$app->security->generateRandomString(10);
            $profile->address = Yii::$app->security->generateRandomString(10);
            $profile->allowed_egifts = 10;
            $profile->user_id = $model->id;
            $profile->logo = Yii::$app->params['default_logo'];
            $profile->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id='')
    {
        $id = ($id === '') ? Yii::$app->user->identity->id: $id;

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id='')
    {
        $id = ($id==='')? Yii::$app->request->post('id'): $id;

        $model = $this->findModel($id);
        $model->status = 9; //deleted
        return $model->save();
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCredential($id='')
    {
        $id = ($id === '') ? Yii::$app->user->identity->id: $id;


        $model = $this->findModel($id);
        $model->scenario = 'update';
        $model->setAccessToken();
        $model->setAuthkey();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->setPassword();
            $model->password_repeat = $model->password;
            $model->save();
            return $this->redirect(['profile']);
        }

        $model->password = '';
        return $this->render('credential', [
            'model' => $model,
        ]);
    }


    public function actionProfile($id='')
    {
        $id = ($id === '') ? Yii::$app->user->identity->profile->id: $id;

        $model = Profile::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('profile', [
            'model' => $model,
        ]);
    }



    public function actionUpdateProfile($id='')
    {

        $id = ($id === '') ? Yii::$app->user->identity->profile->id: $id;

        $model = Profile::findOne($id);

        $user = User::findOne($model->user_id); 
        $model->authorized = $user->status;
        
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
            $model->upload($uploadPath);
            $model->save();


            $user = User::findOne($model->user_id);
            $user->save();


            return $this->redirect(['profile']);
        }


        return $this->render('update-profile', [
            'model' => $model,
            'user' => $user,
        ]);
    }

 
    public function actionStatistics()
    {
        return 'actionStatistics';
    }

    public function actionUserStatistics()
    {
        return 'actionStatistics';
    }

}
