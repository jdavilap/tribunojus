<?php

namespace backend\modules\litigante\controllers;

use backend\modules\litigante\models\PjExpedienteSearch;
use Yii;
use backend\modules\litigante\models\PjSubExpediente;
use backend\modules\litigante\models\PjExpediente;
use backend\modules\litigante\models\PjSubExpedienteSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\JsonParser;

/**
 * PjSubExpedienteController implements the CRUD actions for PjSubExpediente model.
 */
class PjSubExpedienteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PjSubExpediente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PjSubExpedienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PjSubExpediente model.
     * @param integer $id
     * @param integer $id_expediente
     * @return mixed
     */
    public function actionView($id, $id_expediente)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $id_expediente),
        ]);
    }

    /**
     * Creates a new PjSubExpediente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PjSubExpediente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_expediente' => $model->id_expediente]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PjSubExpediente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $id_expediente
     * @return mixed
     */
    public function actionUpdate($id, $id_expediente)
    {
        $model = $this->findModel($id, $id_expediente);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_expediente' => $model->id_expediente]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PjSubExpediente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $id_expediente
     * @return mixed
     */
    public function actionDelete($id, $id_expediente)
    {
        $this->findModel($id, $id_expediente)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PjSubExpediente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $id_expediente
     * @return PjSubExpediente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $id_expediente)
    {
        if (($model = PjSubExpediente::findOne(['id' => $id, 'id_expediente' => $id_expediente])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Devuelve el numero de expediente
     * Si ya existe un sub expediente devuelve el ultimo numero
     * de subexpediente creado.
     *
     **/
    public function actionGetexpediente($id_file)
    {
        $sub_file = PjSubExpediente::findAll(['id_expediente' => $id_file]);

        $sub_file_aux = null;

        if (!$sub_file) {
            $file_temp = PjExpediente::findOne(['id' => $id_file]);
            echo Json::encode($file_temp->n_expendiente);
        } else {
            foreach ($sub_file as $sf) {
                if ($sub_file_aux == null) {
                    $sub_file_aux = $sf;
                } else {
                    $sub_file_aux = $sf;
                }

            }
            echo Json::encode($sub_file_aux->sub_expediente);
        }
    }
}
