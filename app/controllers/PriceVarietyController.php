<?php

namespace app\controllers;

use Yii;
use app\models\Egift;
use app\models\PriceVariety;
use app\models\PriceVarietySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PriceVarietyController implements the CRUD actions for PriceVariety model.
 */
class PriceVarietyController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->permission->getAccess();
    }

    /**
     * Lists all PriceVariety models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PriceVarietySearch();
        $dataProvider = $searchModel->searchAll(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PriceVariety model.
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
     * Creates a new PriceVariety model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PriceVariety();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PriceVariety model.
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
     * Deletes an existing PriceVariety model.
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
     * Finds the PriceVariety model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PriceVariety the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PriceVariety::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLoad($egift_id)
    {
        $searchModel = new PriceVarietySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $egift_id);

        return $this->renderPartial('load', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionAddVariety($orig_price=0, $sale_price=0, $egift_id=0)
    {
        $model = new PriceVariety();
        $model->user_id = Yii::$app->user->identity->id;
        $model->egift_id = $egift_id;
        $model->orig_price = $orig_price;
        $model->sale_price = $sale_price;
        
        return $model->save();
    }

    public function actionRemoveVariety($id)
    {
        return $this->findModel($id)->delete();
    }
}
