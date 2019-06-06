<?php

namespace app\controllers;

use Yii;
use app\models\Month;
use app\models\User;

class DashboardController extends \yii\web\Controller
{
 
	public function behaviors()
    { 
        return Yii::$app->permission->getAccess();
    }

    public function actionIndex()
    {
    	$data['total_merchants'] = count($this->merchants());

        return $this->render('index', $data);
    }


    protected function merchants()
    {
    	return User::findAll([
    		'status' => 1,
    		'user_type' => 8
    	]);
    }



    public function actionChart($type='')
    {
    	$model = '';

    	switch ($type) {
    		case 'merchants':
    			$model = 'user';
    			break;
    		
    		default:
    			# code...
    			break;
    	}

    	$data = $this->fetchChartData($model);

    	return json_encode($data);
    }




    protected function fetchChartData($model='')
    {
    	$records = Month::find()
			->select([
				'(SELECT COUNT("l.*") FROM {{%'.$model.'}} 
				WHERE m.id = MONTH(created_at)) AS total',
				'm.name AS month'
			])
			->alias('m')
			->leftJoin('{{%'.$model.'}} AS l', 'm.id = MONTH(l.created_at)')
			->groupBy('m.id')
			->asArray()
			->all();


		return $records;

    }

   
}
