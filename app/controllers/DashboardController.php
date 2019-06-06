<?php

namespace app\controllers;

use Yii;
use app\models\Month;
use app\models\UserSearch;
use app\models\SalesSearch;
use app\models\EgiftSearch;
use app\models\EgiftUsageSearch;

class DashboardController extends \yii\web\Controller
{
 
	public function behaviors()
    { 
        return Yii::$app->permission->getAccess();
    }

    public function actionIndex()
    {
        $data['total_merchants'] = count(UserSearch::merchants());
        $data['total_merchants_year'] = count(UserSearch::merchants(date('Y')));
        $data['authorized_merchants'] = count(UserSearch::authorizedMerchants());
        $data['unauthorized_merchants'] = count(UserSearch::unAuthorizedMerchants());
        $data['overall_merchants'] = $data['authorized_merchants'] + $data['unauthorized_merchants'];

        $data['sales'] = SalesSearch::saleTransaction();
        $data['sales_year'] = SalesSearch::saleTransaction(date('Y'));

        $data['egift_creation'] = count(EgiftSearch::creation());
        $data['egift_creation_year'] = count(EgiftSearch::creation(date('Y')));

        $data['approved_egift'] = count(EgiftSearch::approved());
        $data['for_approval_egift'] = count(EgiftSearch::for_approval());
        $data['overall_egift_creation'] = $data['approved_egift'] + $data['for_approval_egift'];




        $data['egift_usage'] = count(EgiftUsageSearch::usage());
        $data['egift_usage_year'] = count(EgiftUsageSearch::usage(date('Y')));

        return $this->render('index', $data);
    }





    public function actionChart()
    {
    	
        $data['merchant'] = $this->fetchChartData('user', $this->merchantQuery());
        $data['egift_creation'] = $this->fetchChartData('egift', $this->egiftCreationQuery());
        $data['sale'] = $this->fetchChartData('sales', $this->salesQuery());
        $data['egift_usage'] = $this->fetchChartData('sales', $this->egiftUsageQuery());

    	return json_encode($data);
    }

    protected function egiftUsageQuery()
    {
        return '(
            SELECT COUNT("l.*") 
            FROM {{%egift_usage}}
            WHERE 
                m.id = MONTH(created_at) AND 
                status = 1 
        ) as total';
    }

    protected function salesQuery()
    {
        return '(
            SELECT COALESCE(SUM(amount), 0)
            FROM {{%sales}}
            WHERE 
                m.id = MONTH(created_at) AND 
                status = 1 
        ) as total';
    }


    protected function merchantQuery()
    {
        return '(
            SELECT COUNT("l.*") 
            FROM {{%user}}
            WHERE 
                m.id = MONTH(created_at) AND 
                status = 1 AND 
                user_type = 8
        ) as total';
    }

    protected function egiftCreationQuery()
    {
        return '(
            SELECT COUNT("l.*") 
            FROM {{%egift}}
            WHERE 
                m.id = MONTH(created_at)
        ) as total';
    }


    protected function fetchChartData($model='', $query)
    {

    	$records = Month::find()
			->select([$query, 'm.name AS month'])
			->alias('m')
			->leftJoin('{{%'.$model.'}} AS l', 'm.id = MONTH(l.created_at)')
			->groupBy('m.id')
			->asArray()
			->all();


        $data = [];

        foreach ($records as $record) {
            $data['month'][] = $record['month'];
            $data['total'][] = $record['total'];
        }


		return $data;
    }


   
}
