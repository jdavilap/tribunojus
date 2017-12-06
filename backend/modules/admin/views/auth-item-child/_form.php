<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\modules\admin\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->dropDownList(ArrayHelper::map(AuthItem::find()->all(),'name','name'),[
        'prompt'=>'Seleccione la 1ra regla ...',
        //'class'=>'input-sm'
    ]) ?>
    <?= $form->field($model, 'child')->dropDownList(ArrayHelper::map(AuthItem::find()->all(),'name','name'),[
        'prompt'=>'Seleccione la 2da regla ...',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check-circle"></i> Aceptar' : '<i class="fa fa-edit"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
