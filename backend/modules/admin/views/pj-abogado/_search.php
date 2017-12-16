<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\PjAbogadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pj-abogado-search">

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
