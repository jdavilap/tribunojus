<?php
namespace backend\controllers;

use backend\modules\admin\models\PjAbogadoSearch;
use frontend\models\PasswordResetRequestForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\modules\litigante\models\PjExpediente;
use backend\modules\litigante\models\PjLitigante;
use backend\modules\litigante\models\PjEscrito;
use backend\modules\litigante\models\PjEscritoSearch;
use backend\modules\litigante\models\PjAnexo;
use backend\modules\litigante\models\PjAnexoSearch;
use backend\modules\litigante\models\PjSubExpediente;



/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','reset'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(PjLitigante::findOne(['username'=> Yii::$app->user->identity->username])){
            $modelExpediente = PjExpediente::findOne(['id_cliente' => PjLitigante::findOne(['username' => Yii::$app->user->identity->username])]);
            $searchModelEscrito = new PjEscritoSearch();
            $dataProviderEscrito = $searchModelEscrito->search(Yii::$app->request->queryParams);
            $searchModelAnexo = new PjAnexoSearch();
            $dataProviderAnexo = $searchModelAnexo->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'modelExpediente' => $modelExpediente,
                'dataProviderEscrito'=> $dataProviderEscrito,
                'dataProviderAnexo'=> $dataProviderAnexo
            ]);
        }else{
            return $this->render('index');
        }

    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'mainLogin';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        $this->layout = 'mainLogin';

        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionReset()
    {
        $this->layout = 'mainLogin';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }
        return $this->render('reset', [
            'model' => $model,
        ]);
    }
}
