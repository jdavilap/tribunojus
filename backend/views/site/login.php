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
    <?php $form = ActiveForm::begin(
        [
            'id' => 'login-form',
            'options' =>
                [
                    'class' => 'client-form smart-form',
                ]
        ]) ?>
    <header>
        <h2> Iniciar Sección</h2>
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
                <?= Html::a('¿ Olvidaste tu contraseña ?',['reset']); ?>
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
    <?php ActiveForm::end() ?>
</div>
