<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="user-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'smart-form',
            'id' => 'user-form',
            'novalidate' => 'novalidate'
        ]
    ]); ?>

    <fieldset>
        <div class="row">
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model, 'first_name')->textInput() ?>
                </label>
            </section>
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model, 'last_name')->textInput() ?>
                </label>
            </section>
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model, 'dni')->textInput() ?>
                </label>
            </section>
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model, 'domicilio')->textInput() ?>
                </label>
            </section>
        </div>
        <div class="row">
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model, 'username')->textInput() ?>
                </label>
            </section>

            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model, 'email')->textInput() ?>
                </label>
            </section>

            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </label>
            </section>
        </div>
    </fieldset>

    <footer>
        <?= Html::submitButton('<i class="fa fa-check"></i> Guardar ', ['class' => 'btn btn-info', 'name' => 'signup-button']) ?>
        <button type="button" class="btn btn-default" onclick="window.history.back();">
            <i class="fa fa-times"></i> Cancelar
        </button>
    </footer>


    <?php ActiveForm::end(); ?>
</div>
