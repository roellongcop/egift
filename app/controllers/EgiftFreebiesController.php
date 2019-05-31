<?php

namespace app\controllers;

use Yii;
use app\models\Freebies;
use app\models\EgiftFreebies;
use app\models\EgiftFreebiesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EgiftFreebiesController implements the CRUD actions for EgiftFreebies model.
 */
class EgiftFreebiesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->permission->getAccess();
    }

    /**
     * Lists all EgiftFreebies models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EgiftFreebiesSearch();
        $dataProvider = $searchModel->searchAll(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EgiftFreebies model.
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
     * Creates a new EgiftFreebies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EgiftFreebies();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EgiftFreebies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EgiftFreebies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EgiftFreebies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EgiftFreebies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EgiftFreebies::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAddFreebies($freebies_id='', $qty='', $egift_id=0)
    {
        if ($freebies_id !== '' && $qty !== '') {
            $freebies = Freebies::findOne($freebies_id);

            // if ($qty <= $freebies->qty) {

                $where = ['freebies_id' => $freebies_id, 'egift_id' => $egift_id];

                
                if($egift_id == 0) {
                    $where['user_id'] = Yii::$app->user->identity->id;
                }

                $model = EgiftFreebies::findOne($where);


                if ($model !== null) {
                    $model->qty = $model->qty + $qty;
                    
                    
                } else {
                    $model = new EgiftFreebies();

                    $model->user_id = Yii::$app->user->identity->id;
                    $model->egift_id = $egift_id;
                    $model->freebies_id = $freebies_id;
                    $model->qty = $qty;
                }

                if ($model->qty != 0) {
                    $model->save();
                }


                $remaining_qty = $freebies->qty - $qty;

                $freebies->qty = $remaining_qty <= 0 ? 0: $remaining_qty ;
                $freebies->save();

            // }
        }
        
        $searchModel = new EgiftFreebiesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $egift_id);

        return $this->renderAjax('_list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRemoveFreebies($id='')
    {
        // $model = $this->findModel($id);
        // $freebies = Freebies::findOne($model->freebies_id);

        // $freebies->qty = $freebies->qty + $model->qty;
        // $freebies->save();

        $this->findModel($id)->delete();

        return true;
    }
}
