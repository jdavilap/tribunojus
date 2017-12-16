<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjAnexoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pj-anexo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="input-group">
        <section class="col col-2 pull-left">
            <?= $form->field($model, 'globalSearch')->textInput([
                'placeholder' => 'Buscar',
            ]) ?>
        </section>
    </div>

    <?php ActiveForm::end() ?>

</div>
