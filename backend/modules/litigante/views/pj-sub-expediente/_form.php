<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\modules\litigante\models\PjExpediente;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjSubExpediente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pj-sub-expediente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_expediente')->dropDownList(ArrayHelper::map(PjExpediente::find()->all(),'id','n_expendiente'),[
        'class'=>'select2',
        'style'=> 'whith: 100%',
        'prompt'=> 'SELECCIONE UN EXPEDIENTE...',
        'id'=> 'subexpediente'
    ]) ?>

    <?= $form->field($model, 'sub_expediente')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
