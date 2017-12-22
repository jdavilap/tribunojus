<?php
/**
 * Created by PhpStorm.
 * User: J&D
 * Date: 20/12/2017
 * Time: 11:14
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
?>
<div class="site-reset">

    <?php $form = ActiveForm::begin(
        [
            'id' => 'reset-password-form',
            'options'=>[
                'class'=>'smart-form client-form'
            ]
        ]
    ); ?>

    <header>
        <h2>Resetear Contraseña</h2>
    </header>

    <fieldset>
        <section>
            <label class="input">
                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
            </label>
        </section>
    </fieldset>
    <footer>
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
    </footer>

    <?php ActiveForm::end(); ?>
</div>
