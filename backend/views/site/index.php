<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\modules\litigante\models\PjLitigante;

$this->title = 'Pantalla Principal'
?>
<div class="site-index">
    <h1 class="page-title txt-color-blueDark" style="font-family: " Lucida Grande", "Lucida Sans Unicode", Verdana,
    Arial, Helvetica, sans-serif">
    <i class="fa fa-desktop fa-fw "></i> PANTALLA PRINCIPAL
    </h1>

    <?php if (PjLitigante::findOne(['username' => Yii::$app->user->identity->username])) : ?>
        <section id="widget-grid">
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false"
                 data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
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
                    <h2>SEGUIMIENTO DEL EXPEDIENTE</h2>
                </header>

                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body">

                        <div class="tabs-left">
                            <ul class="nav nav-tabs tabs-left" id="demo-pill-nav">
                                <li class="active">
                                    <a href="#tab-r1" data-toggle="tab">EXPEDIENTE</a>
                                </li>
                                <li>
                                    <a href="#tab-r2" data-toggle="tab">RESOLUCIÓN</a>
                                </li>
                                <li>
                                    <a href="#tab-r3" data-toggle="tab">ANEXOS</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-r1">
                                    <div class="col col-sm-11">
                                        <?= DetailView::widget([
                                            'model' => $modelExpediente,
                                            'attributes' => [
                                                //'id',
                                                'n_expendiente',
                                                'juez',
                                                'fecha_inicio:date',
                                                //'observacion',
                                                //'materia',
                                                'etapa_procesal',
                                                'ubicacion',
                                                //'sumilla',
                                                //'distrito_judicial',
                                                'proceso',
                                                'especialidad',
                                                'estado',
                                                'fecha_conclusion',
                                                'motivo_conclusion',
                                                //'id_cliente',
                                            ],
                                            'options' => [
                                                'class' => 'table table-hover smart-form'
                                            ]
                                        ]) ?>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-r2">
                                    <div class="col col-sm-11">
                                        <?php Pjax::begin(); ?>    <?= GridView::widget([
                                            'dataProvider' => $dataProviderEscrito,
                                            //'filterModel' => $searchModel,
                                            'tableOptions' => ['class' => 'table table-hover smart-form'],
                                            //'rowOptions' => ['class' => 'info'],
                                            'summary' => false,
                                            'columns' => [
                                                ['class' => 'yii\grid\SerialColumn'],
                                                'fecha:date',
                                                'resolucion',
                                                'acto',
                                                'sumilla',
                                                'escrito',
                                                [
                                                    'class' => 'yii\grid\ActionColumn',
                                                    'template' => '{download}{anexos}',
                                                    'buttons' => [
                                                        'download' => function ($url, $model) {
                                                            return Html::a('<i class="fa fa-download"></i>', $model->escrito, [
                                                                'title' => 'descargar'
                                                            ]);
                                                        }
                                                    ]
                                                ],
                                            ],
                                        ]); ?>
                                        <?php Pjax::end(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-r3">
                                    <div class="col col-sm-11">
                                        <?php Pjax::begin(); ?>    <?= GridView::widget([
                                            'dataProvider' => $dataProviderAnexo,
                                            //'filterModel' => $searchModel,
                                            'tableOptions' => ['class' => 'table table-hover smart-form'],
                                            //'rowOptions' => ['class' => 'info'],
                                            'summary' => false,
                                            'columns' => [
                                                ['class' => 'yii\grid\SerialColumn'],

                                                //'id',
                                                'anexo',
                                                'fecha',
                                                'notificacion:boolean',
                                                'id_escrito',

                                                ['class' => 'yii\grid\ActionColumn'],
                                            ],
                                        ]); ?>
                                        <?php Pjax::end(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->
        </section>
    <?php endif; ?>
</div>
