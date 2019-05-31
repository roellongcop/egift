<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\Breadcrumbs;

$asset = AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
	<script>
		var base_url = '<?= Yii::$app->urlManager->baseUrl ?>/';
	  window.dataLayer = window.dataLayer || [];

	  function gtag() {
		dataLayer.push(arguments);
	  }
	  gtag('js', new Date());
	  // Shared ID
	  gtag('config', 'UA-118965717-3');
	  // Bootstrap ID
	  gtag('config', 'UA-118965717-5');
	</script>
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<?php $this->beginBody() ?>
	<header class="app-header navbar">
		<button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#">
			<img class="navbar-brand-full" src="<?= Yii::$app->template->getLogo() ?>" alt="CoreUI Logo">
			<img class="navbar-brand-minimized" src="<?= Yii::$app->template->getLogo()?>"  alt="CoreUI Logo">
		</a>
		<button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
			<span class="navbar-toggler-icon"></span>
		</button>
		<ul class="nav navbar-nav d-md-down-none">
			<li class="nav-item px-3">
				<a class="nav-link" href="#">
					<?= ucwords(Yii::$app->user->identity->profile->name) ?>
				</a>
			</li>
		</ul>
	  	<ul class="nav navbar-nav ml-auto">
			<li class="nav-item d-md-down-none">
				<a class="nav-link" href="#">
					<i class="icon-bell"></i>
					<span class="badge badge-pill badge-danger">5</span>
				</a>
			</li> 
			<li class="nav-item dropdown">
		  		<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					<img class="img-avatar" src="<?= Yii::$app->template->_image() ?>" alt="admin@bootstrapmaster.com">
		  		</a>
		  		<div class="dropdown-menu dropdown-menu-right">
					<div class="dropdown-header text-center">
			  			<strong>Account</strong>
					</div>

					<?= Html::a('<i class="fa fa-lock"></i> Credentials', ['/credential'], [
						'class' => 'dropdown-item'
					]) ?>

					<div class="dropdown-header text-center">
						<strong>Settings</strong>
					</div>
					
					<?= Html::a('<i class="fa fa-user"></i> Profile', ['/profile'], [
						'class' => 'dropdown-item'
					]) ?>

					<?= Html::beginForm(['/site/logout'], 'post', ['id' => 'frm-logout']) ?>
					<?= Html::endForm() ?>
					<a class="dropdown-item btn-logout" href="#">
						<i class="fa fa-power-off"></i> 
						Logout
					</a>
		  		</div>
			</li>
	  	</ul>
	</header>


	<div class="app-body"> 
 
		<?= $this->render('_admin_sidebar') ?> 
		 



		<main class="main">
			<!-- Breadcrumb-->
			<?= Breadcrumbs::widget([
			    'homeLink' => ['label' => 'Dashboard', 'url' => ['/dashboard']],
			    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			    'itemTemplate' => "<li class=\"breadcrumb-item\">{link}</li>\n",
			    'activeItemTemplate' => "<li class=\"breadcrumb-item active\">{link}</li>\n"
			]) ?>


			<div class="container-fluid">
				<div class="animated fadeIn">
					<div class="card">
						<div class="card-body">
							<?= $content ?>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>


	<footer class="app-footer">
		<div>
			<span>&copy; <?= date('Y') ?> Egift.</span>
		</div>
		<div class="ml-auto">
			<span>Merchant Name</span>
		</div>
	</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
