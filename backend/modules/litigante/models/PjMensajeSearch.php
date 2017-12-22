<?php

namespace backend\modules\litigante\models;

use backend\modules\admin\models\PjAbogado;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\litigante\models\PjMensaje;

/**
 * PjMensajeSearch represents the model behind the search form about `backend\modules\litigante\models\PjMensaje`.
 */
class PjMensajeSearch extends PjMensaje
{

    public $globalSearch;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_abogado', 'id_litigante'], 'integer'],
            [['status'], 'boolean'],
            [['asunto', 'contenido','globalSearch'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'globalSearch' => ''
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        if(PjLitigante::findOne(['username'=> Yii::$app->user->identity->username])){
            $query = PjMensaje::find()->where(['id_litigante'=> PjLitigante::findOne(['username'=> Yii::$app->user->identity->username])->id,'receptor'=> 'litigante']);
        }elseif(PjAbogado::findOne(['username'=> Yii::$app->user->identity->username])){
            $query = PjMensaje::find()->where(['id_abogado'=> PjAbogado::findOne(['username'=> Yii::$app->user->identity->username])->id,'receptor'=> 'abogado']);
        }else{
            $query = PjMensaje::find();
        }


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=> 10
            ],
            'sort' => [
                'defaultOrder' => [
                    'fecha' => SORT_DESC,

                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'asunto', $this->globalSearch])
            ->orFilterWhere(['like', 'contenido', $this->globalSearch]);

        return $dataProvider;
    }
}
