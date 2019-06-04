<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use app\models\LoginForm;
use app\models\User;
use app\models\UserSearch;
use app\models\EgiftSearch;
use app\models\Profile;
use app\models\Egift;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return Yii::$app->permission->getAccess();
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction($action)
    {
        switch ($action->id) {
            case 'signup':
            case 'login':
            case 'authorization':
            case 'send-email':
            case 'error':
                $this->layout = 'authentication';
                break;
            case 'index':
            case 'merchant-list':
            case 'merchant-egifts':
            case 'merchant':

                $this->layout = 'site';
            default:
                break;
        }

        return parent::beforeAction($action);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/dashboard']);
        }

        
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/dashboard']);
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/login']);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $profile = new Profile();
            $profile->user_id = $model->id;
            $profile->name = 'Name';
            $profile->description = 'Description';
            $profile->tel_no = 'Tel no.';
            $profile->address = 'Address';
            $profile->logo = 'Logo';
            $profile->save();

            return $this->redirect(['site/send-email', 'auth_key' => $model->auth_key]);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionSendEmail($auth_key)
    {
        return $this->render('authorized-email', [
            'auth_key' => $auth_key,
        ]);
    }


    public function actionAuthorization($auth_key)
    {
        $user = User::findOne(['auth_key' => $auth_key]);

        $model = Profile::findOne(['user_id' => $user->id]);
        $model->scenario = 'create';
        $model->user_id = $user->id;

        $user->scenario = 'update';


        if ($model->load(Yii::$app->request->post()) && $model->validate() && $user->load(Yii::$app->request->post()) && $user->validate()) {

            $user->status = 1;
            $user->setPassword();
            $user->password_repeat = $user->password;
            $user->save();


            $uploadPath = Yii::$app->template->createFolder(['uploads', 'merchant']); 
            $model->logo_input = UploadedFile::getInstance($model, 'logo_input');
            $model->logo_banner_input = UploadedFile::getInstance($model, 'logo_banner_input');
            $model->upload($uploadPath);
            $model->save();


            Yii::$app->user->login($user, 0);

            return $this->redirect(['/dashboard']);
        }

        $user->password = '';

        return $this->render('authorization', [
            'user' => $user,
            'model' => $model,
        ]); 
    }


    public function actionMerchantList()
    {
        $searchModel = new UserSearch();
        $searchModel->user_type = 1;
        $searchModel->pagination = 6;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('merchant/list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionMerchant($id)
    {
        $model = User::findOne($id);


        return $this->render('merchant/view', [
            'model' => $model,
        ]);

    }


    public function actionMerchantEgifts($id)
    {
        $model = User::findOne($id);
        $searchModel = new EgiftSearch();
        $searchModel->merchant_id = $id;
        $searchModel->pageSize = 9;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('merchant/egifts', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
}
