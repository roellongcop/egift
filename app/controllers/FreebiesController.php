<?php

namespace app\controllers;

use Yii;
use app\models\Freebies;
use app\models\FreebiesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * FreebiesController implements the CRUD actions for Freebies model.
 */
class FreebiesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->permission->getAccess();
    }

    /**
     * Lists all Freebies models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FreebiesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Freebies model.
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
     * Creates a new Freebies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Freebies();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $uploadPath = Yii::$app->template->createFolder(['uploads', 'freebies']); 
            $model->image_input = UploadedFile::getInstance($model, 'image_input');
            $model->upload($uploadPath);
            $model->user_id = Yii::$app->user->identity->id;
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Freebies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $uploadPath = Yii::$app->template->createFolder(['uploads', 'freebies']); 
            $model->image_input = UploadedFile::getInstance($model, 'image_input');
            $model->upload($uploadPath);
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Freebies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id='')
    {
        $id = ($id==='')? Yii::$app->request->post('id'): $id;

        $model = Freebies::findOne($id);
        $model->status = 9; //deleted
        return $model->save();
    }

    /**
     * Finds the Freebies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Freebies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Freebies::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionLists($id='')
    {
        $where = $id===''? ['status' => 0]: ['id' => $id];

        $records = Freebies::find()
            ->where($where)
            ->asArray()
            ->all();

        return json_encode($records);
    }

    public function actionDetails($id='')
    {
        $model = $this->findModel($id);

        return 'Description: ' .  $model->description;
        // return $this->renderPartial('_details', ['model' => $model]);
    }
}
