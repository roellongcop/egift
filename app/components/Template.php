<?php
namespace app\components;

use Yii; 
use app\models\About;
use yii\helpers\Html;
/**
 * 
 */
class Template extends \yii\base\Component
{

	public $qr = QR_URL;

	 
 
	public function message()
	{
		if (Yii::$app->session->hasFlash('success')) {
			return '
				<div class="alert alert-success">
		            '. Yii::$app->session->getFlash('success') .'
		        </div>
	        ';
		}
	}

	public function _form($icon) 
	{
		return [
			'template' => ' {label}
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="icon-'. $icon .'"></i>
						</span>
					</div>
					{input}
				</div>
				{error}
			'
		];
	}


	public function _video($video = "")
	{
		$uploadPath = Yii::$app->template->createFolder(['uploads', 'videos']); 

		return Yii::$app->urlManager->baseUrl . '/'.$uploadPath.$video;
	}

	public function _image($image = "")
	{
		if ($image === "") {
			$profile = Yii::$app->user->identity->profile;

			$image = ($profile->logo !== null) ? $profile->logo: '';
		}
		
		return Yii::$app->urlManager->baseUrl . '/' . $image;
	}


	public function createFolder($data=[], $path='')
	{

		foreach ($data as $folder) {
			$path = $path . $folder . '/';

	        if ( ! is_dir($path) ) {
	            mkdir($path); 
	        } 
		}
		
	    return $path;
	}

	public function generateQR($code='', $path='')
	{
		if ($path === '') {
			$path = $this->createFolder(['uploads', 'QR']);
		} else {
			$path = $this->createFolder($path);
		}

		return $path . file_get_contents(
			$this->qr . 
			'?path=' . Yii::getAlias('@webroot') . '/'. $path .'&code='.
			$code
		);

	}

   
 
	public function getLogo()
	{
		return Yii::$app->urlManager->baseUrl . '/' . About::findOne(['status' => 0])->logo;
	}


	public function createButton($title='')
	{
		if(Yii::$app->permission->canCreate()) {
			return '<p>' .  Html::a('Create ' . ucwords($title), ['create'], ['class' => 'btn btn-success']) . '</p>';
		}
	}


	public function updateButton($model)
	{
		if(Yii::$app->permission->canUpdate()) {
        	return Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
		}
	}


	public function approvedEgift($model)
	{
		if($model->status == 0) {
			if(Yii::$app->permission->checkAccess('approved')) {
				return Html::a('Approved', ['approved', 'id' => $model->id], ['class' => 'btn btn-success']);
			}
		}
	}


	public function disapprovedEgift($model)
	{
		if($model->status == 1) {
			if(Yii::$app->permission->checkAccess('disapproved')) {
        		return Html::a('Disapproved', ['disapproved', 'id' => $model->id], ['class' => 'btn btn-warning']);
			}
		}
	}


	

	public function deleteButton($model, $name='name')
	{
		if(Yii::$app->permission->canDelete()) {
        	return Html::a('Delete', '#delete', [
	            'title' => 'Delete',
	            'class' => 'btn btn-danger  delete',
	            'data-key' => $model->id,
	            'data-selected' => $model->$name,
	            'data-page' => Yii::$app->controller->id,
	        ]);
		}
	}


	public function actionColumns()
	{
		$permission = Yii::$app->permission;


		$columns = $permission->canView() ? ' {view}': '';
		$columns .= $permission->canUpdate() ? ' {update}': '';
		$columns .= $permission->canDelete() ? ' {delete}': '';

		return $columns;
	}


	public function actionButtons($column='name')
	{
		return [
			'class' => 'yii\grid\ActionColumn',
			'headerOptions' => ['width' => 130],
			'template' =>  $this->actionColumns(),
			'buttons' => [
				'view' => function($url) {
					return Html::a('<i class="fa fa-th-large"></i>', $url, [
						'title' => 'View',
						'class' => 'btn btn-info btn-sm'
					]);
				},
				'update' => function($url) {
					return Html::a('<i class="fa fa-edit"></i>', $url, [
						'title' => 'Update',
						'class' => 'btn btn-success btn-sm'
					]);
				},
				'delete' => function($url, $model) use ($column) {
					return Html::a('<i class="fa fa-trash"></i>', '#delete', [
						'title' => 'Delete',
						'class' => 'btn btn-danger btn-sm delete',
						'data-key' => $model->id,
						'data-selected' => $model->$column,
						'data-page' => Yii::$app->controller->id,
					]);
				}
			]
		];
	}
}