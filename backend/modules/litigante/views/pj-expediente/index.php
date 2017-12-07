<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\litigante\models\PjExpedienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'EXPEDIENTES';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pj-expediente-index">

    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="well">
            <!-- row -->
            <div class="row">
                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-0"
                         data-widget-editbutton="false" data-widget-collapsed="true">
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
                            <span class="widget-icon"> <i class="fa fa-folder"></i> </span>

                            <h2><?= Html::encode($this->title) ?></h2>
                        </header>
                        <!-- widget div-->
                        <div>

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->
                                <input class="form-control" type="text">
                            </div>
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body">
                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                                <?php Pjax::begin(); ?><?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        //['class' => 'yii\grid\SerialColumn'],

                                        //'id',
                                        'n_expendiente',
                                        'juez',
                                        'fecha_inicio:date',
                                        //'observacion',
                                        //'materia',
                                        'etapa_procesal',
                                        'ubicacion',
                                        //'sumilla',
                                        'distrito_judicial',
                                        //'proceso',
                                        //'especialidad',
                                        //'estado',
                                        // 'fecha_conclusion',
                                        // 'motivo_conclusion',
                                        'id_cliente',

                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]); ?>
                                <?php Pjax::end(); ?>
                            </div>
                        </div>
                        <!-- end widget div -->
                    </div>
                    <!-- end widget -->
                </article>
                <!-- WIDGET END -->
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
