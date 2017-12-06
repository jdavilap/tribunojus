<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjLitigante */

$this->title = 'LITIGANTE: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'LITIGANTES', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pj-litigante-view">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="well">
            <!-- row -->
            <div class="row">
                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p>
                        <?= Html::a('<i class="fa fa-edit"></i> ACTUALIZAR', ['update', 'id' => $model->id, 'username' => $model->username], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('<i class="fa fa-minus"></i> ELIMINAR', ['delete', 'id' => $model->id, 'username' => $model->username], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => '¿Esta seguro que desea eliminar esta asignación ?',
                                'method' => 'post',
                            ],
                        ]) ?>

                        <?php if ($model->set_expediente == 0) { ?>

                            <?= Html::a('<i class="fa fa-plus-circle"></i> ADICIONAR EXPEDIENTE', [
                                '/litigante/pj-expediente/create', 'id_cliente' => $model->id],
                                [
                                    'class' => 'btn btn-success',
                                    'id' => 'btn_create_expediente'
                                ]);
                            ?>
                        <?php } ?>
                    </p>

                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-blueDark " id="wid-id-1"
                             data-widget-editbutton="false" data-widget-fullscreenbutton="true"
                             data-widget-colorbutton="false" data-widget-deletebutton="false">
                            <!-- widget options:
                                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                                data-widget-colorbutton="false"
                                data-widget-editbutton="false"
                                data-widget-togglebutton="false"
                                data-widget-deletebutton="false"
                                data-widget-fullscreenbutton="false"
                                data-widget-custombutton="false"
                                data-widget-collapsed="true"
                                data-widget-sortable="false"

                            -->
                            <header>
                                <span class="widget-icon"> <i class="fa fa-user"></i> </span>

                                <h2><?= Html::encode($this->title) ?></h2>
                            </header>
                            <!-- widget div-->
                            <div>
                                <!-- widget content -->
                                <div class="widget-body">
                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            //'id',
                                            'username',
                                            'id_abogado',

                                    ]
                                        ]) ?>
                                </div>
                            </div>
                            <!-- end widget div -->
                        </div>
                        <!-- end widget -->


                        <?php if ($model->set_expediente == 1) { ?>


                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-redLight " id="wid-id-0"
                             data-widget-editbutton="false" data-widget-fullscreenbutton="true"
                             data-widget-colorbutton="false" data-widget-deletebutton="false">
                            <!-- widget options:
                                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                                data-widget-colorbutton="false"
                                data-widget-editbutton="false"
                                data-widget-togglebutton="false"
                                data-widget-deletebutton="false"
                                data-widget-fullscreenbutton="false"
                                data-widget-custombutton="false"
                                data-widget-collapsed="true"
                                data-widget-sortable="false"

                            -->
                            <header>
                                <span class="widget-icon"> <i class="fa fa-file"></i> </span>

                                <h2><?= Html::encode('EXPEDIENTE: ' . $model_file->n_expendiente) ?></h2>
                            </header>
                            <!-- widget div-->
                            <div>
                                <!-- widget content -->
                                <div class="widget-body">
                                    <?= DetailView::widget([
                                        'model' => $model_file,
                                        'attributes' => [
                                            //'id',
                                            'n_expendiente',
                                            'juez',
                                            'fecha_inicio:date',
                                            'observacion',
                                            'materia',
                                            'etapa_procesal',
                                            'ubicacion',
                                            'sumilla',
                                            'distrito_judicial',
                                            'proceso',
                                            'especialidad',
                                            'estado',
                                            'fecha_conclusion',
                                            'motivo_conclusion',
                                            //'id_cliente',
                                        ],
                                    ]) ?>
                                </div>
                            </div>
                            <!-- end widget div -->
                        </div>
                        <!-- end widget -->

                    <?php } ?>

                </article>
                <!-- WIDGET END -->
            </div>
            <!-- end row -->
        </div>
    </div>

</div>