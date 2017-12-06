<?php

namespace backend\modules\admin\controllers;

use yii\web\Controller;
use backend\modules\admin\models\AuthItem;
use Yii;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSecurity()
    {
        return $this->render('security');
    }

}
