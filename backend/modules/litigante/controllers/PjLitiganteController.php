<?php

namespace backend\modules\litigante\controllers;

use backend\modules\admin\models\PjAbogado;
use Yii;
use backend\modules\litigante\models\PjLitigante;
use backend\modules\litigante\models\PjExpediente;
use backend\modules\litigante\models\PjLitiganteSearch;
use frontend\models\SignupForm;
use yii\web\Controller;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PjLitiganteController implements the CRUD actions for PjLitigante model.
 */
class PjLitiganteController extends Controller
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
     * Lists all PjLitigante models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PjLitiganteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PjLitigante model.
     * @param integer $id
     * @param string $username
     * @return mixed
     */
    public function actionView($id, $username)
    {

        return $this->render('view', [
            'model' => $this->findModel($id, $username),
            'model_file' => PjExpediente::findOne(['id_cliente' => $id])

        ]);
    }

    /**
     * Creates a new PjLitigante model with User Model .
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PjLitigante();
        $model_sign = new SignupForm();

        if ($model_sign->load(Yii::$app->request->post())) {
            $model->username = $model_sign->username ;
            $model->id_abogado = PjAbogado::find()->where(['username' => Yii::$app->user->identity->username])->one()->id;

            if ($this->notIsAbogado($model->username)) {
                if ($model_sign->signup()) {
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id, 'username' => $model->username]);
                } else {
                    return $this->render('create', [
                        'model' => $model,
                        'model_sign' => $model_sign
                    ]);
                }
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model_sign' => $model_sign
                ]);
            }

        } else {

            return $this->render('create', [
                'model' => $model,
                'model_sign' => $model_sign
            ]);
        }
    }

    public function notIsAbogado($username)
    {
        if (PjAbogado::findOne(['username' => $username])) {
            return Yii::$app->session->setFlash('danger', '! Por favor escoja otro nombre de usuario, este ya está siendo usado como un abogado ¡');
        } else {
            return true;

        }
    }

    /**
     * Updates an existing PjLitigante model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $username
     * @return mixed
     */
    public function actionUpdate($id, $username)
    {

        $model = $this->findModel($id, $username);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'username' => $model->username]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PjLitigante model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param string $username
     * @return mixed
     */
    public function actionDelete($id, $username)
    {
        $this->findModel($id, $username)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PjLitigante model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $username
     * @return PjLitigante the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $username)
    {
        if (($model = PjLitigante::findOne(['id' => $id, 'username' => $username])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
