<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\litigante\models\PjLitiganteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Litigantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pj-litigante-index">
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
                    <span class="widget-icon"> <i class="fa fa-user"></i> </span>

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
                                <section class="col col-sm-6 text-right">
                                    <?= Html::a('<i class="fa fa-plus"></i> Crear', ['create'], ['class' => 'btn btn-info']) ?>
                                </section>
                            </div>
                        </div>
                        <?php Pjax::begin(); ?>    <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //'filterModel' => $searchModel,
                            'tableOptions' => ['class' => 'table table-hover smart-form'],
                            //'rowOptions' => ['class' => 'info'],
                            'summary' => false,
                            'rowOptions'=> function($model){

                                if($model['set_expediente']== 1){
                                    return ['class'=> 'default'];
                                }else{
                                    return ['class'=> 'danger'];
                                }
                            },
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //'id',
                                'username',
                                'id_abogado',

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
