<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
            <h1 class="txt-color-red login-header-big">SmartAdmin</h1>
            <div class="hero">

                <div class="pull-left login-desc-box-l">
                    <h4 class="paragraph-header">It's Okay to be Smart. Experience the simplicity of SmartAdmin, everywhere you go!</h4>
                    <div class="login-app-icons">
                        <a href="javascript:void(0);" class="btn btn-danger btn-sm">Frontend Template</a>
                        <a href="javascript:void(0);" class="btn btn-danger btn-sm">Find out more</a>
                    </div>
                </div>

                <img src="img/demo/iphoneview.png" class="pull-right display-image" alt="" style="width:210px">

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h5 class="about-heading">About SmartAdmin - Are you up to date?</h5>
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
                    </p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h5 class="about-heading">Not just your average template!</h5>
                    <p>
                        Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi voluptatem accusantium!
                    </p>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
            <div class="well padding">
                <?php $form = ActiveForm::begin(
                    [
                        'id' => 'login-form',
                        'options' =>
                            [
                                'class' => 'client-form',
                            ]
                    ]); ?>
                <header>
                   <h2>Iniciar Seccion</h2>
                </header>
                <fieldset>
                    <section>
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                    </section>
                    <section>
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </section>
                    <section>
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </section>
                </fieldset>
                <footer>
                    <div class="form-group">
                        <?= Html::submitButton('Acceder', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </footer>
                <?php ActiveForm::end(); ?>
            </div>
            <h5 class="text-center"><div class="note">
                    <?= Html::a('- Olvidaste tu contraseña? -', ['site/request-password-reset']) ?>
                </div>
        </div>
    </div>
</div>