<?php

namespace backend\modules\litigante\controllers;

use Yii;
use backend\modules\litigante\models\PjExpediente;
use backend\modules\litigante\models\PjExpedienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PjExpedienteController implements the CRUD actions for PjExpediente model.
 */
class PjExpedienteController extends Controller
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
     * Lists all PjExpediente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PjExpedienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PjExpediente model.
     * @param integer $id
     * @param string $n_expendiente
     * @return mixed
     */
    public function actionView($id, $n_expendiente)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $n_expendiente),
        ]);
    }

    /**
     * Creates a new PjExpediente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_cliente)
    {
        $model = new PjExpediente();

        if ($model->load(Yii::$app->request->post())) {

            $model->fecha_inicio = date_parse($model->fecha_inicio);
            $model->fecha_inicio = mktime(null, null, null, $model->fecha_inicio['month'], $model->fecha_inicio['day'], $model->fecha_inicio['year'], null);

            $model->id_cliente = $id_cliente;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'n_expendiente' => $model->n_expendiente]);
            }
            else {

                return $this->render('create', [
                    'model' => $model,
                    'id_cliente' => $id_cliente,
                ]);
            }

        } else {

            return $this->render('create', [
                'model' => $model,
                'id_cliente' => $id_cliente,
            ]);
        }
    }

    /**
     * Updates an existing PjExpediente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $n_expendiente
     * @return mixed
     */
    public function actionUpdate($id, $n_expendiente)
    {
        $model = $this->findModel($id, $n_expendiente);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'n_expendiente' => $model->n_expendiente]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PjExpediente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param string $n_expendiente
     * @return mixed
     */
    public function actionDelete($id, $n_expendiente)
    {
        $this->findModel($id, $n_expendiente)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PjExpediente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $n_expendiente
     * @return PjExpediente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $n_expendiente)
    {
        if (($model = PjExpediente::findOne(['id' => $id, 'n_expendiente' => $n_expendiente])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
