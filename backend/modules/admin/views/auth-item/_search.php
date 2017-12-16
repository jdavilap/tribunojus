<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AuthItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="input-group">
        <section class="col col-2 pull-left">
            <?= $form->field($model, 'globalSearch')->textInput([
                'class' => 'form-control input-sm',
                'placeholder' => 'Buscar',
            ]) ?>
        </section>
    </div>

    <?php ActiveForm::end(); ?>

</div>
