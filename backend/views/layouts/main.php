<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use common\widgets\Alert;

AppAsset::register($this);
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
</head>
<body class="desktop-detected fixed-header smart-style-0">
<?php $this->beginBody() ?>
<!-- #HEADER -->
<header id="header">
    <div id="logo-group">
        <!-- PLACE YOUR LOGO HERE -->
        <span id="logo"> <img src="img/logo-tribunojus.png"> </span>
        <!-- END LOGO PLACEHOLDER -->
        <!-- Note: The activity badge color changes when clicked and resets the number to 0
					 Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
        <span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>
    </div>
    <!-- #PROJECTS: projects dropdown -->
    <div class="project-context hidden-xs">

        <span class="label"><?= Yii::$app->user->identity->username ?></span>
        <span class="project-selector dropdown-toggle" data-toggle="dropdown">Configuración <i
                class="fa fa-angle-down"></i></span>

        <!-- Suggestion: populate this list with fetch and push technique -->
        <ul class="dropdown-menu">
            <li>
                <?php
                $model = \backend\modules\admin\models\User::find()->where(['username' => Yii::$app->user->identity->username])->one();
                ?>
                <?= Html::a('Configuración: <i class="fa fa-user"></i> Perfil', ['/admin/user/view', 'id' => $model->id], ['class' => 'btn btn-link']) ?>
            </li>
            <li>
                <?= Html::a('Configuración: <i class="fa fa-lg fa-sign-out"></i> Salir', ['/site/logout'], [
                    'class' => 'btn btn-link',
                    'data' => [
                        'confirm' => '¿Esta seguro que desea cerrar la seccion ' . '(' . Yii::$app->user->identity->username . ')' . '?',
                        'method' => 'post',

                    ],
                    'title' => 'Salir',

                ]) ?>
            </li>
        </ul>
        <!-- end dropdown-menu-->

    </div>
    <!-- end projects dropdown -->
    <!-- #TOGGLE LAYOUT BUTTONS -->
    <!-- pulled right: nav area -->
    <div class="pull-right">
        <!-- collapse menu button -->
        <div id="hide-menu" class="btn-header pull-right">
            <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i
                        class="fa fa-reorder"></i></a> </span>
        </div>
        <!-- end collapse menu -->
        <!-- fullscreen button -->
        <div id="fullscreen" class="btn-header transparent pull-right">
            <span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Pantalla Completa"><i
                        class="fa fa-arrows-alt"></i></a> </span>
        </div>
        <!-- end fullscreen button -->
    </div>
    <!-- end pulled right: nav area -->

</header>
<!-- END HEADER -->
<!-- #NAVIGATION -->
<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">
    <!-- NAVIGATION : This navigation is also responsive

    To make this navigation dynamic please make sure to link the node
    (the reference to the nav > ul) after page load. Or the navigation
    will not initialize.
    -->
    <nav>
        <ul>
            <li class="">
                <a href="<?php Yii::$app->homeUrl ?>?r=site/index" title="INICIO"><i class="fa fa-lg fa-fw fa-home"></i>
                    <span class="menu-item-parent">INICIO</span></a>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-lg fa-fw fa-cogs"></i><span class="menu-item-parent">ADMIN WEB</span> </a>
                <ul>
                    <li class="">
                        <a href="<?php Yii::$app->homeUrl ?>?r=admin/user">USUARIOS</a>
                    </li>
                    <li class="">
                        <a href="<?php Yii::$app->homeUrl ?>?r=admin/pj-abogado">ABOGADOS</a>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-lg fa-fw fa-lock"></i><span
                                class="menu-item-parent">RBAC SEGURIDAD</span></a>
                        <ul>
                            <li class="">
                                <a href="<?php Yii::$app->homeUrl ?>?r=admin/auth-item">REGLAS</a>
                            </li>
                            <li class="">
                                <a href="<?php Yii::$app->homeUrl ?>?r=admin/auth-item-child">REGLAS EMPAREJADAS</a>
                            </li>
                            <li class="">
                                <a href="<?php Yii::$app->homeUrl ?>?r=admin/auth-assignment">ASIGNACIONES</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="<?php Yii::$app->homeUrl ?>?r=litigante/pj-litigante"><i class="fa fa-lg fa-fw fa-user"></i><span
                        class="menu-item-parent">LITIGANTE</span></a>
            </li>
            <li class="">
                <a href="<?php Yii::$app->homeUrl ?>?r=litigante/pj-expediente"><i class="fa fa-lg fa-fw fa-folder"></i><span
                        class="menu-item-parent">EXPEDIENTE</span></a>
            </li>
            <li class="">
                <a href="<?php Yii::$app->homeUrl ?>?r=litigante/pj-sub-expediente"><i class="fa fa-lg fa-fw fa-folder-open"></i><span
                        class="menu-item-parent">SUB EXPEDIENTE</span></a>
            </li>
            <li class="">
                <a href="<?php Yii::$app->homeUrl ?>?r=litigante/pj-escrito"><i class="fa fa-lg fa-fw fa-edit"></i><span
                        class="menu-item-parent">ESCRITO</span></a>
            </li>
            <li class="">
                <a href="<?php Yii::$app->homeUrl ?>?r=litigante/pj-anexo"><i class="fa fa-lg fa-fw fa-paperclip"></i><span
                        class="menu-item-parent">ANEXO</span></a>
            </li>
        </ul>
    </nav>
    <span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

</aside>
<!-- END NAVIGATION -->
<!-- #MAIN PANEL -->
<div id="main" role="main">
    <?= Breadcrumbs::widget(
        [
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],

        ]) ?>
    <!-- #MAIN CONTENT -->
    <div id="content">

        <!-- This is auto generated -->

        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <!-- END #MAIN CONTENT -->
</div>
<!-- END #MAIN PANEL -->
<!-- #PAGE FOOTER -->
<div class="page-footer">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <span class="txt-color-white">TribunoJus</span>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- END FOOTER -->
<?php
echo "<script>";
echo "homeUrl = '" . Yii::$app->homeUrl . "';";
echo "</script>";
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
