<?php

namespace backend\modules\admin\controllers;

use backend\modules\admin\models\User;
use backend\modules\litigante\models\PjLitigante;
use Prophecy\Exception\Prediction\FailedPredictionException;
use Yii;
use backend\modules\admin\models\PjAbogado;
use backend\modules\admin\models\PjAbogadoSearch;
use frontend\models\SignupForm;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PjAbogadoController implements the CRUD actions for PjAbogado model.
 */
class PjAbogadoController extends Controller
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
     * Lists all PjAbogado models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('ver-abogados')) {
            $searchModel = new PjAbogadoSearch();
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
     * Displays a single PjAbogado model.
     * @param integer $id
     * @param string $username
     * @return mixed
     */
    public function actionView($id, $username)
    {
        if (Yii::$app->user->can('ver-abogados')) {
            return $this->render('view', [
                'model' => $this->findModel($id, $username),
            ]);
        } else {
            throw new ForbiddenHttpException;
        }

    }

    /**
     * Creates a new PjAbogado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('crear-abogado')) {
            $model = new PjAbogado();
            $model_sign = new SignupForm();

            if ($model_sign->load(Yii::$app->request->post())) {
                $model->username = $model_sign->username;

                if ($this->notIsLitigante($model->username)) {
                    if ($model_sign->signup()) {
                        if ($model->save()) {
                            Yii::$app->session->setFlash('success', 'SE HA CREADO CORRECTAMENTE EL ABOGADO');
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

            } else {

                return $this->render('create', [
                    'model' => $model,
                    'model_sign' => $model_sign
                ]);
            }
        } else {
            throw new ForbiddenHttpException;
        }
    }

    public function notIsLitigante($username)
    {

        if (PjLitigante::findOne(['username' => $username])) {
            //var_dump('enadsada');die;
            return Yii::$app->session->setFlash('danger', '! Por favor escoja otro nombre de usuario, este ya esta siendo usado como un litigante ¡');

        } else {
            return true;
        }
    }

    /**
     * Updates an existing PjAbogado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $username
     * @return mixed
     */
    public function actionUpdate($id, $username)
    {
        if (Yii::$app->user->can('update-abogado')) {
            $model = $this->findModel($id, $username);
            $model_sign = User::findOne(['username' => $username]);

            if ($model->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post())) {
                $model_sign->username = $model->username;
                if ($this->notIsLitigante($model->username)) {
                    if ($model->save()) {
                        $model_sign->save();
                        return $this->redirect(['view', 'id' => $model->id, 'username' => $model->username]);
                    } else {
                        return $this->render('update', [
                            'model' => $model,
                            'model_sign' => $model_sign
                        ]);
                    }
                } else {
                    return $this->render('update', [
                        'model' => $model,
                        'model_sign' => $model_sign
                    ]);
                }
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'model_sign' => $model_sign
                ]);
            }
        } else {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing PjAbogado model.
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
     * Finds the PjAbogado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $username
     * @return PjAbogado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $username)
    {
        if (($model = PjAbogado::findOne(['id' => $id, 'username' => $username])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
