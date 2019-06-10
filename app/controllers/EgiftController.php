<?php

namespace app\controllers;

use Yii;

use app\models\Branches;
use app\models\Freebies;
use app\models\Egift;
use app\models\EgiftSearch;
use app\models\EgiftFreebies;
use app\models\PriceVariety;
use app\models\EgiftBranches;


use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EgiftController implements the CRUD actions for Egift model.
 */
class EgiftController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->permission->getAccess();
    }

    /**
     * Lists all Egift models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EgiftSearch();
        $searchModel->status = 1;

        $data['searchModel'] = $searchModel;

        $data['dataProvider'] = $searchModel->search(Yii::$app->request->queryParams);


        if(Yii::$app->user->identity->user_type === 9) {
            return $this->render('index', $data);
        }

        return $this->render('merchant-index', $data);
    }


    public function actionForApproval()
    {
        $searchModel = new EgiftSearch();
        $searchModel->status = 0;
        
        $data['searchModel'] = $searchModel;

        $data['dataProvider'] = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('for-approval', $data);
    }

    public function actionApproved($id)
    {
        $model = $this->findModel($id);

        $model->status = 1;

        if($model->save()) {
            Yii::$app->session->setFlash('success', 'Approved!');
            return $this->redirect(['view', 'id' => $id]);
        }
    }


    public function actionDisapproved($id)
    {
        $model = $this->findModel($id);

        $model->status = 0;

        if($model->save()) {
            Yii::$app->session->setFlash('success', 'Disapproved!');
            return $this->redirect(['view', 'id' => $id]);
        }
    }


    /**
     * Displays a single Egift model.
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

    protected function generateCode($length=10)
    {
        $str = Yii::$app->security->generateRandomString($length);

        if(Egift::findOne(['qr_code' => $str]) !== null) {
            return $this->generateCode($length);
        }

        return $str;
    }

    /**
     * Creates a new Egift model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Egift();
        // $model->scenario = 'create';
        $price_variety = new PriceVariety();

        $model->merchant_id = Yii::$app->user->identity->user_type === 9? $model->merchant_id:Yii::$app->user->identity->id;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $uploadPath = Yii::$app->template->createFolder(['uploads', 'egifts']); 
            $model->image_input = UploadedFile::getInstance($model, 'image_input');
            $model->image_banner_input = UploadedFile::getInstance($model, 'image_banner_input');
            $model->upload($uploadPath);

            $model->qr_code = $this->generateCode();
            $model->qr_image = Yii::$app->template->generateQR($model->qr_code);

            if ($model->save()) {

                $this->insertEgiftBranches($model);
                $this->updateEgiftFreebies($model);
                $this->updatePriceVariety($model);
            
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        
        return $this->render('create', [
            'price_variety' => $price_variety,
            'model' => $model,
        ]);
    }

    

    protected function updatePriceVariety($model)
    {
        PriceVariety::updateAll(['egift_id' => $model->id], [
            'egift_id' => 0, 
            'user_id' => Yii::$app->user->identity->id
        ]);
    }

    protected function updateEgiftFreebies($model)
    {
        EgiftFreebies::updateAll(['egift_id' => $model->id], [
            'egift_id' => 0, 
            'user_id' => Yii::$app->user->identity->id
        ]);
    }


    protected function insertEgiftBranches($model)
    {
        if($model->branches) {
            
            foreach ($model->branches as $branch) {
                $egift_branches = new EgiftBranches();

                $egift_branches->branch_id = Branches::findOne($branch)->id;

                $egift_branches->egift_id = $model->id;

                $egift_branches->save();
            }
        }
    }

    /**
     * Updates an existing Egift model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->merchant_id = (Yii::$app->user->identity->user_type === 9) ? $model->merchant_id:Yii::$app->user->identity->id;

        if ($model->load(Yii::$app->request->post())) {
            $model->branches = isset(Yii::$app->request->post()['Egift']['branches'])? json_encode($model->branches): '';

            $uploadPath = Yii::$app->template->createFolder(['uploads', 'egifts']); 
            $model->image_input = UploadedFile::getInstance($model, 'image_input');
            $model->image_banner_input = UploadedFile::getInstance($model, 'image_banner_input');

            if ($model->validate()) {
                $model->upload($uploadPath);

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Egift model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id='')
    {
        $id = ($id==='')? Yii::$app->request->post('id'): $id;

        $model = Egift::findOne($id);
        $model->status = 9; //deleted
        return $model->save();
    }

    /**
     * Finds the Egift model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Egift the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Egift::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGenerateReferralCode()
    {
        $code = Yii::$app->security->generateRandomString(10);

        if (Egift::findOne(['referral_code' => $code]) !== null) {
            return $this->actionGenerateReferralCode();
        }
        return $code;
    }

    public function actionDetails($id)
    {
        $model = $this->findModel($id);

        $this->layout = 'site';
        return $this->render('details', ['model' => $model]);
    }


    public function actionStatistics()
    {
        return 'actionStatistics';
    }
    
}
