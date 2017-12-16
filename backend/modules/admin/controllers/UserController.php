<?php

namespace backend\modules\admin\controllers;

use Yii;
use backend\modules\admin\models\User;
use frontend\models\SignupForm;
use backend\modules\admin\models\UserSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('ver-usuarios')) {
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            $message = '! Prohibido ¡ - Usted no tiene permiso para realizar esta acción';
            throw new ForbiddenHttpException;
        }

    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can('ver-usuarios')) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            $message = '! Prohibido ¡ - Usted no tiene permiso para realizar esta acción';
            throw new ForbiddenHttpException($message);
        }

    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('crear-usuario')) {
            $model = new SignupForm();

            if ($model->load(Yii::$app->request->post())) {

                if ($user = $model->signup()) {
                    return $this->redirect(['view', 'id' => $user->id]);
                }
            }
            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            $message = '! Prohibido ¡ - Usted no tiene permiso para realizar esta acción';
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('update-usuario')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {

                if ($model->save()) {

                    return $this->redirect(['view', 'id' => $model->id, 'username' => $model->username]);
                } else {
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }

            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }else{
            $message = '! Prohibido ¡ - Usted no tiene permiso para realizar esta acción';
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
