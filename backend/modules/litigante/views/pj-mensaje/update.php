<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjMensaje */

$this->title = 'Actualizar Mensaje: ' . $model->asunto.'-'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mensajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->asunto.'-'.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="pj-mensaje-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
