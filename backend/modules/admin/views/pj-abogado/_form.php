<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\PjAbogado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pj-abogado-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'smart-form',
            'id' => 'abogado-form',
            'novalidate' => 'novalidate'
        ]
    ]); ?>

    <fieldset>
        <div class="row">
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model_sign,'first_name')->textInput() ?>
                </label>
            </section>
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model_sign,'last_name')->textInput() ?>
                </label>
            </section>
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model_sign,'dni')->textInput() ?>
                </label>
            </section>
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model_sign,'domicilio')->textInput() ?>
                </label>
            </section>
        </div>
        <div class="row">
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model_sign,'username')->textInput() ?>
                </label>
            </section>

            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model_sign,'email')->textInput() ?>
                </label>
            </section>

            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model_sign,'password')->passwordInput() ?>
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
