<?php

namespace backend\modules\litigante\controllers;

use Yii;
use yii\web\Controller;
use backend\modules\litigante\models\PjArchivo;

/**
 * Default controller for the `litigante` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
      $model_archivo = new  PjArchivo();

        if ($model_archivo->load(Yii::$app->request->post()) && $model_archivo->save()) {
            return $this->redirect(['index', 'id' => $model_archivo->id, 'escrito' => $model_archivo->archivo]);
        } else {
            return $this->render('index', [
                'model_archivo' => $model_archivo,
            ]);
        }
    }
}
