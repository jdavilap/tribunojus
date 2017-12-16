<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\modules\litigante\models\PjExpediente;
use backend\modules\litigante\models\Distrito;


/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjExpediente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pj-expediente-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'smart-form',
            'id' => 'expediente-form',
            'novalidate' => 'novalidate',
            'enableClientValidation'=> false
        ]
    ]); ?>

    <fieldset>
        <div class="row">
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model,'n_expendiente')->textInput()?>
                </label>
            </section>
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model,'juez')->textInput()?>
                </label>
            </section>
        </div>
        <div class="row">
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model,'fecha_inicio')->textInput([
                        'class'=>'datepicker'
                    ])?>
                </label>
            </section>
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model,'materia')->textInput()?>
                    </label>
            </section>
        </div>
        <div class="row">
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model,'etapa_procesal')->textInput()?>
                </label>
            </section>
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model,'ubicacion')->textInput()?>
                </label>
            </section>
        </div>
        <div class="row">
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model,'sumilla')->textInput()?>
                </label>
            </section>
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model,'proceso')->textInput()?>
                </label>
            </section>
        </div>
        <div class="row">
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model,'especialidad')->textInput()?>
            </section>
            <section class="col col-6">
                <label class="input">
                    <?= $form->field($model,'estado')->textInput()?>
                </label>
            </section>
        </div>
        <div class="row">
            <section class="col col-6">
                <label class="textarea">
                    <?= $form->field($model,'observacion')->textarea()?>
                    </label>
            </section>
            <section class="col col-6">
                <?= $form->field($model, 'distrito_judicial')->dropDownList(ArrayHelper::map(Distrito::find()->all(), 'name', 'name'), [
                        'class' => 'select2',
                        'style' => 'whith: 100%',
                        'prompt' => 'SELECCIONE UN DISTRITO JUDICIAL...',
                    ]

                ) ?>
            </section>
        </div>
    </fieldset>

    <footer>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check"></i> Guardar' : '<i class="fa fa-edit"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <button type="button" class="btn btn-default" onclick="window.history.back();">
            <i class="fa fa-times"></i> Cancelar
        </button>
    </footer>

    <?php ActiveForm::end(); ?>

</div>

