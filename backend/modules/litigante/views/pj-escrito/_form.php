<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjEscrito */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pj-escrito-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
            'class'=> 'smart-form form-data'
        ]
    ]); ?>
    <fieldset>
        <div class="row">
            <section class="col col-10">
                <label class="input">
                    <?= $form->field($model,'sumilla')->textInput() ?>
                </label>
            </section>
            <section class="col col-10">
                <label class="input">
                    <?= $form->field($model,'acto')->textInput() ?>
                </label>
            </section>
            <section class="col col-10">
                <label class="input">
                    <?= $form->field($model,'resolucion')->textInput() ?>
                </label>
            </section>
            <section class="col col-10">
                <label class="input-file">
                    <?= $form->field($model,'file')->fileInput(['multiple' => true, 'accept' => 'pdf/*']) ?>
                </label>
            </section>
            <section class="col col-10">
                <label class="textarea">
                    <?= $form->field($model, 'observacion')->textarea() ?>
                </label>
            </section>
        </div>

    </fieldset>
    <footer>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check"></i> Guardar' : '<i class="fa fa-edit"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <button type="button" class="btn btn-default" onclick="window.history.back();">
            <i class="fa fa-times"></i> Cancelar
        </button>
    </footer>
    <?php ActiveForm::end() ?>

</div>
