<?php

namespace app\controllers;

use Yii;
use app\models\Personnel;
use app\models\PersonnelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PersonnelController implements the CRUD actions for Personnel model.
 */
class PersonnelController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->permission->getAccess();
    }

    /**
     * Lists all Personnel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonnelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personnel model.
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
     * Creates a new Personnel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Personnel();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $uploadPath = Yii::$app->template->createFolder(['uploads', Yii::$app->controller->id]); 
            $model->logo_input = UploadedFile::getInstance($model, 'logo_input');
            $model->upload($uploadPath);
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Personnel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $uploadPath = Yii::$app->template->createFolder(['uploads', Yii::$app->controller->id]); 
            $model->logo_input = UploadedFile::getInstance($model, 'logo_input');
            $model->upload($uploadPath);
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Personnel model.
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
     * Finds the Personnel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Personnel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Personnel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
