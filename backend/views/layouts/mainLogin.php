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
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">

                <div class="row">

                    <img src="img/demo/tribunojus_login2.png" class="display-image" alt="" style="width:600px">

                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h5 class="about-heading">Acerca de TribunoJus - ¿ Estas al día ?</h5>

                        <p>
                            TribunoJus es una Web hecha para los clientes del mismo bufete, donde te bridamos la
                            información más actualizada
                            acerca de tu proceso Judicial.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h5 class="about-heading">¡ Como me hago cliente del bufete TribunoJus !</h5>

                        <p>
                            Puedes encontrarnos en la siguiente dirección: Manuel Villaran, No. 110 - Urb. San Agustín -
                            II
                            Teléfono: 956-523-181 / 406-6317
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                <div class="well no-padding">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
