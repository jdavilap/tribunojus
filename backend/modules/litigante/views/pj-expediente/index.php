<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\litigante\models\PjExpedienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expedientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pj-expediente-index">
    <!-- START ROW -->
    <div class="row">
        <!-- NEW COL START -->
        <article class="col-sm-12 col-md-12 col-lg-12">
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-blueDark">
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

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body">
                        <div class="widget-body-toolbar">
                            <div class="row">
                                <section class="col col-sm-6">
                                    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                                </section>
                            </div>
                        </div>

                        <?php Pjax::begin(); ?>    <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //'filterModel' => $searchModel,
                            'tableOptions' => ['class' => 'table table-hover smart-form'],
                            //'rowOptions' => ['class' => 'info'],
                            'summary' => false,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

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
                                [
                                    'attribute'=> 'id_cliente',
                                    'value'=> function($model){
                                        return \backend\modules\litigante\models\PjLitigante::findOne(['id'=>$model['id_cliente']])->username;
                                    }
                                ],

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                        <?php Pjax::end(); ?>
                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->
        </article>
        <!-- END COL -->
    </div>
    <!-- END ROW -->
</div>
