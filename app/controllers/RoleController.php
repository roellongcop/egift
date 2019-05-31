<?php

namespace app\controllers;

use Yii;
use app\models\Icon;
use app\models\Role;
use app\models\RoleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoleController implements the CRUD actions for Role model.
 */
class RoleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    { 
        return Yii::$app->permission->getAccess();
    }

    /**
     * Lists all Role models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RoleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Role model.
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
     * Creates a new Role model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($name="")
    {
        $model = new Role();
        $model->name = $name;


        if ($model->load(Yii::$app->request->post())) {
            $model->navigation = json_encode($model->navigation);
            $model->actions = json_encode($model->actions);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Role model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->navigation = json_encode($model->navigation);
            $model->actions = json_encode($model->actions);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Role model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id='')
    {
        $id = ($id==='')? Yii::$app->request->post('id'): $id;


        $model = Role::findOne($id);
        $model->status = 9; //deleted
        return $model->save();
    }

    /**
     * Finds the Role model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Role the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Role::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetMainMenu()
    {
        $data['icons'] = Icon::find()
            ->where(['status' => 0])
            ->orderBy(['name' => SORT_ASC])
            ->all();

        $data['main_key'] = Yii::$app->security->generateRandomString(15);

        return $this->renderPartial('_main-menu', $data);
    }


    public function actionGetSubMenu($main_key="")
    {
        $data['icons'] = Icon::find()
            ->where(['status' => 0])
            ->orderBy(['name' => SORT_ASC])
            ->all();

        $data['main_key'] = $main_key;
        $data['sub_key'] = Yii::$app->security->generateRandomString(15);

        return $this->renderPartial('_sub-menu', $data);
    }
}
