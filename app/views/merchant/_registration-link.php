<?php
use yii\helpers\Html;
use yii\helpers\Url;

$link = Url::to(['site/authorization', 'auth_key' => $auth_key], 'http');

echo Html::a($link, $link, ['target' => '_blank']);
?>


