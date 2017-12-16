<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use common\models\LoginForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);
$model = new LoginForm();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html id="extr-page" lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="img/favicon/tribunojus.ico" type="image/x-icon">
</head>
<body class="animated fadeInDown">
<?php $this->beginBody() ?>
<header id="header">
<!--    <div id="logo-group">-->
<!--        <span id="logo"> <img src="img/logo-tribunojus.png" alt="SmartAdmin"> </span>-->
<!--    </div>-->
</header>
<div id="main" role="main">
    <!-- MAIN CONTENT -->
    <div id="content" class="container">
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
