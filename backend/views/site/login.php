<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Acceder';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">

            <div class="row">

                <img src="img/demo/tribunojus_login2.png" class="display-image" alt="" style="width:600px">

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h5 class="about-heading">Acerca de TribunoJus - ¿ Estas al día ?</h5>

                    <p>
                        TribunoJus es una Web hecha para los clientes del mismo bufete, donde te bridamos la información más actualizada
                        acerca de tu proceso Judicial.
                    </p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h5 class="about-heading">¡ Como me hago cliente del bufete TribunoJus !</h5>

                    <p>
                        Puedes encontrarnos en la siguiente dirección: Manuel Villaran, No. 110  - Urb. San Agustín - II
                        Teléfono: 956-523-181 / 406-6317
                    </p>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
            <div class="well no-padding">
                <?php $form = ActiveForm::begin(
                    [
                        'id' => 'login-form',
                        'options' =>
                            [
                                'class' => 'client-form smart-form',
                            ]
                    ]) ?>
                <header>
                    Iniciar Sección
                </header>
                <fieldset>
                    <section>
                        <label class="input">
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                        </label>
                    </section>
                    <section>
                        <label class="input">
                            <?= $form->field($model, 'password')->passwordInput() ?>
                        </label>
                        <div class="note">
                            <a href="#">¿ Olvidaste tu contraseña ?</a>
                        </div>
                    </section>
                    <section>
                        <label class="checkbox">
                            <input type="checkbox" checked="checked" value="1" name="LoginForm[rememberMe]" title="Recordarme">
                            <i></i>
                            Recordarme
                        </label>
                    </section>
                </fieldset>
                <footer>
                    <?= Html::submitButton('Acceder', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </footer>
            </div>
            <?php ActiveForm::end() ?>

        </div>
    </div>
</div>
