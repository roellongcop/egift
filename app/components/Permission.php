<?php
namespace app\components;

use Yii; 
use yii\helpers\Html;
use app\models\Role;
use yii\helpers\FileHelper;
use yii\helpers\Inflector;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


/**
 * 
 */
class Permission extends \yii\base\Component
{


	public function controllerActions($res = [])
	{
		$controllers = FileHelper::findFiles(Yii::getAlias('@app/controllers'), [
			'recursive' => true
		]);

		foreach ($controllers as $key => $controller) {
			$contents = file_get_contents($controller);
			$controller_ID = Inflector::camel2id(substr(basename($controller), 0, -14));
			preg_match_all('/public function action(\w+?)\(/', $contents, $result);
			

			foreach ($result[1] as $action) {
				$action_ID = Inflector::camel2id($action);

				if($action_ID !== 's') {
					$res[$controller_ID][] = $action_ID;
				}
			}
		}

		// asort($res);

		return $res;
	}

	public function getActionPages($params_menu = "", $controller_actions="")
	{
		$controller_actions = $controller_actions === ""? $this->controllerActions(): $controller_actions;
		$params_menu = $params_menu === "" ? Yii::$app->params['menu']: $params_menu;


		foreach ($params_menu as $key => $menu) {
			if (in_array($key, array_keys($controller_actions))) {
				unset($controller_actions[$key]);
			} 


			if(isset($menu['sub']) && !empty($menu['sub'])) { 
				$controller_actions =  $this->getActionPages($menu['sub'], $controller_actions);
			}
		}


		return $controller_actions;
	}

	public function actions($controller="")
	{ 
		if ($controller === "") {
			return $this->controllerActions()[Yii::$app->controller->id];
		} 

		$actions = $this->controllerActions();

		return isset($actions[$controller]) ? $actions[$controller]: [];
	}
 

  

	public function createSidebar($access="")
	{ 
		if ($access === "") {
			$access = [];

			if (isset(Yii::$app->user->identity->role->access)) {
				$access = json_decode(
					Yii::$app->user->identity->role->access, true
				);
			}
		}

		foreach ($access as $key => $menu) { 
			$menu['title'] = isset($menu['title']) ? $menu['title']: '';
			
			if($menu['title']) { 
				if(isset($menu['sub']) && !empty($menu['sub'])) { 
					
					$keys = array_keys($menu['sub']);

					$open = in_array(Yii::$app->controller->id, $keys) ? 'open': "";


					echo '<li class="nav-item nav-dropdown '. $open .'">';
						echo Html::a('<i class="nav-icon '.$menu['icon'].'"></i> ' . ucwords(str_replace("-", " ", $menu['title'])),
							($key=='#')? $key: ['/' . $key], 
							['class' => 'nav-link nav-dropdown-toggle']
						); 
						echo '<ul class="nav-dropdown-items">';
							$this->createSidebar($menu['sub']);
						echo'</ul>';
					echo '</li>'; 
				} else { 
					echo '<li class="nav-item">';
					echo Html::a('<i class="nav-icon '.$menu['icon'].'"></i> ' . ucwords(str_replace("-", " ", $menu['title'])),
							($key=='#')? $key: ['/' . $key], 
							['class' => (Yii::$app->controller->id == $key)? 'nav-link active': 'nav-link']
						);
					echo '</li>'; 
				} 
			} 
		} 

	}




	public function generateSidebar($navigations="")
	{ 
		if ($navigations === "") {
			$navigations = [];

			if (isset(Yii::$app->user->identity->role->navigation)) {
				$navigations = json_decode(
					Yii::$app->user->identity->role->navigation, TRUE
				);
			}
		}

		if($navigations) {

			foreach ($navigations as $key => $menu) { 
				$menu['title'] = isset($menu['title']) ? $menu['title']: '';
				
				if($menu['title']) { 
					if(isset($menu['sub']) && !empty($menu['sub'])) { 
						
						echo '<li class="nav-item nav-dropdown ">';
							echo Html::a('<i class="nav-icon '.$menu['icon'].'"></i> ' . ucwords(str_replace("-", " ", $menu['title'])),
								$menu['url'], 
								['class' => 'nav-link nav-dropdown-toggle', 'data-url' =>'']
							); 
							echo '<ul class="nav-dropdown-items">';
								$this->generateSidebar($menu['sub']);
							echo'</ul>';
						echo '</li>'; 
					} 
					else { 
						echo '<li class="nav-item">';
						echo Html::a('<i class="nav-icon '.$menu['icon'].'"></i> ' . ucwords(str_replace("-", " ", $menu['title'])),
							Url::to([$menu['url']], TRUE), 
							['class' => 'nav-link', 'data-url' => $menu['url']]
						);
						echo '</li>'; 
					} 
				} 
			} 

		}
	}



	public function getActions($action = [], $access="", $controller='')
	{ 
		$controller = $controller ? $controller: Yii::$app->controller->id;

		if ($access === "") {
			$access = [];

			if (isset(Yii::$app->user->identity->role->actions)) {
				$access = json_decode(
					Yii::$app->user->identity->role->actions, true
				);
			}
		}
 
		foreach ($access as $key => $menu) { 
			if($controller == $key) {
				return $menu;
			}
		} 
	}

	public function getGuestActions($actions=[], $access=[])
	{
		if (Yii::$app->user->isGuest) {
			$model = Role::findOne(['name' => 'guest', 'status' => 0]);
			if ($model !== null) {
	            $access = $model->access ? $model->access: [];
	        } else {
	        	throw new NotFoundHttpException('The requested page does not exist.');
	        }
		}

		$access = is_array($access) ? $access: json_decode($access, true);


		return $this->getActions($actions, $access);
		
	}


	public function getAccess($actions=[])
	{
		
		return [
            'access' => [
				'class' => AccessControl::className(),
				'only' => $this->actions(),
                'rules' => [
                    [
                        'actions' => $this->getActions(),
                        'allow' => true,
                        'roles' => ['@'],
					],
					[
                        'actions' => $this->getGuestActions(),
                        'allow' => true,
                        'roles' => ['?'],
					],
                ],
			], 
			'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
	}


	public function getModules($modules, $html= '')
	{
		foreach ($modules as $key => $module) {
			$title = isset($module['title']) ? $module['title']: '';
			$actions = isset($module['actions']) ? json_encode($module['actions']): '';
			
			if($title) { 
				$html .= (strpos($key, "#") === 0) ? '':  '
				<label class="alert alert-primary">
					<i class="'. $module['icon'] .'"></i> 
					<a href="'. Url::to([$key . '/index']) .'">'
					 . $title .
					'</a>
				</label> ';

				if(isset($module['sub']) && !empty($module['sub'])) { 
					$html .= $this->getModules($module['sub']);
				}
			}
		}

		return $html;
	}

	public function getMyActions($actions=[])
	{
		if($actions) {

			return Yii::$app->controller->renderPartial('/role/_actions', [
				'actions' => $actions
			]);
		}
	}


	public function getMyNavigation($navigations=[])
	{
		if($navigations) {
			return Yii::$app->controller->renderPartial('/role/_navigations', [
				'navigations' => $navigations
			]);
		}
	}
	

  
	public function hasGuest()
	{
		$model = Role::findOne(['name' => 'guest']);

		return $model !== null;
	}


	public function checkAccess($action='', $controller='')
	{
		$actions = $this->getActions('','',$controller);

		return in_array($action, $actions);
	}


	


	public function canCreate()
	{
		return $this->checkAccess('create');
	}


	public function canView()
	{
		return $this->checkAccess('view');
	}


	public function canUpdate()
	{
		return $this->checkAccess('update');
	}

	public function canDelete()
	{
		return $this->checkAccess('delete');
	}


	public function getRoutes()
	{
		$controller_actions = $this->controllerActions();

		$res = [];

		foreach ($controller_actions as $module => $actions) {
			foreach ($actions as $action) {
				$res[] =  $module . '/' . $action;
			}
		}

		return $res;
	}


}