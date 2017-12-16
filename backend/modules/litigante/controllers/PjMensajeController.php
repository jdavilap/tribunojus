<?php

namespace backend\modules\litigante\controllers;

use backend\modules\admin\models\PjAbogado;
use backend\modules\litigante\models\PjLitigante;
use Yii;
use backend\modules\litigante\models\PjMensaje;
use backend\modules\litigante\models\PjMensajeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PjMensajeController implements the CRUD actions for PjMensaje model.
 */
class PjMensajeController extends Controller
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
     * Lists all PjMensaje models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PjMensajeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PjMensaje model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model->status = false;
        $model->save();

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new PjMensaje model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PjMensaje();
        $model->receptor = '';
        $model->status = false;

        if ($model->load(Yii::$app->request->post())) {

            $model->fecha = time();

            if (PjLitigante::findOne(['username' => Yii::$app->user->identity->username])) {
                $model->id_abogado = PjLitigante::findOne(['username' => Yii::$app->user->identity->username])->id_abogado;
                $model->id_litigante = PjLitigante::findOne(['username' => Yii::$app->user->identity->username])->id;
                $model->status = true;
                $model->receptor = 'abogado';
            } elseif (PjAbogado::findOne(['username' => Yii::$app->user->identity->username])) {
                $model->id_abogado = PjLitigante::findOne(['id_abogado' => PjAbogado::findOne(['username' => Yii::$app->user->identity->username])->id])->id_abogado;
                $model->status = true;
                $model->receptor = 'litigante';
            } else {
                Yii::$app->session->setFlash('danger', 'Solo pueden enviar mensajes los usuarios con rol de abogado o litigante');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            if ($model->save()) {
                return $this->redirect(['index', '$model' => $model]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }


        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PjMensaje model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PjMensaje model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PjMensaje model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PjMensaje the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PjMensaje::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
