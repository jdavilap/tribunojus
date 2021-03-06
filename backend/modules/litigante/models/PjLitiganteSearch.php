<?php

namespace backend\modules\litigante\models;

use backend\modules\admin\models\PjAbogado;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\litigante\models\PjLitigante;

/**
 * PjLitiganteSearch represents the model behind the search form about `backend\modules\litigante\models\PjLitigante`.
 */
class PjLitiganteSearch extends PjLitigante
{

    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_abogado'], 'integer'],
            [['username','globalSearch'], 'safe'],
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

        if (PjAbogado::findOne(['username'=> Yii::$app->user->identity->username])) {
            $query = PjLitigante::find()->where(['id_abogado' => PjAbogado::findOne(['username' => Yii::$app->user->identity->username])->id])->asArray();
        }
        else{
            $query = PjLitigante::find();
        }


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=> [
                'pageSize'=> 5
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'username', $this->globalSearch]);

        return $dataProvider;
    }
}
