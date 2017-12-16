<?php

namespace backend\modules\litigante\controllers;

use backend\modules\litigante\models\PjSubExpediente;
use Yii;
use backend\modules\litigante\models\PjAnexo;
use backend\modules\litigante\models\PjExpediente;
use backend\modules\litigante\models\PjEscrito;
use backend\modules\litigante\models\PjLitigante;
use backend\modules\admin\models\User;
use backend\modules\litigante\models\PjAnexoSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PjAnexoController implements the CRUD actions for PjAnexo model.
 */
class PjAnexoController extends Controller
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
     * Lists all PjAnexo models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('ver-anexos')) {
            $searchModel = new PjAnexoSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new ForbiddenHttpException;
        }

    }

    /**
     * Displays a single PjAnexo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can('ver-anexos')) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Creates a new PjAnexo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new PjAnexo();

        if ($model->load(Yii::$app->request->post())) {


            if ($model->file) {

                $model->file = UploadedFile::getInstance($model, 'file');

                $model->file->saveAs('anexoUpload/' . $model->file->baseName . '.' . $model->file->extension);

                $model->anexo = 'anexoUpload/' . $model->file->baseName . '.' . $model->file->extension;

                $model->notificacion = true;

                $model->fecha = time();

                $model->id_escrito = $id;
            } else {
                Yii::$app->session->setFlash('danger', '¡ Error ! Por favor seleccione un anexo, es requerido ');
            }

            if (PjEscrito::findOne(['id' => $id])->id_expediente) {
                $email = User::findOne(['username' => PjLitigante::findOne(['id' => PjExpediente::findOne(['id' => PjEscrito::findOne(['id' => $id])->id_expediente])->id_cliente])->username])->email;
            } else {
                $email = User::findOne(['username' => PjLitigante::findOne(['id' => PjExpediente::findOne(['id' => PjSubExpediente::findOne(['id' => PjEscrito::findOne(['id' => $id])->id_sub_expediente])])->id_cliente])->username])->email;
            }

            $html_body = '<h1><label class="label-success"> Email enviado con exito </label></h1>';

            $value = Yii::$app->mailer->compose()
                ->setTo([$email])
                ->setSubject('No-reply')
                ->setTextBody('Su expediente ha sido actualizado con un nuevo escrito, para revizarlo revise el sitio oficial www.tribunojus.pe')
                ->setHtmlBody($html_body);

            if ($model->save()) {

                $value->send();
                return $this->redirect(['view', 'id' => $model->id]);
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
     * Updates an existing PjAnexo model.
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
     * Deletes an existing PjAnexo model.
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
     * Finds the PjAnexo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PjAnexo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PjAnexo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
