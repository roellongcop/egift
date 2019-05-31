<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Profile;
use app\models\ProfileSearch;


class CorporateController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->permission->getAccess();
    }

    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'corporate');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        
        return $this->render('view', [
            'model' => $model
        ]);
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
            return $this->redirect(['corporate/index']);
        }

        return ;
    }

    public function actionSetToAuthorized($user_id="")
    {
        $model = $this->findUser($user_id);

        $model->status = 1;

        if($model->save()) {
            return $this->redirect(['corporate/index']);
        }

        return ;
    }


    public function actionSetToUnauthorized($user_id="")
    {
        $model = $this->findUser($user_id);

        $model->status = 0;

        if($model->save()) {
            return $this->redirect(['corporate/index']);
        }

        return ;
    }


    public function actionStatistics()
    {
        return 'actionStatistics';
    }


}
