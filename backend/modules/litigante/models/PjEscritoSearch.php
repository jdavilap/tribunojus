<?php

namespace backend\modules\litigante\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\litigante\models\PjEscrito;

/**
 * PjEscritoSearch represents the model behind the search form about `backend\modules\litigante\models\PjEscrito`.
 */
class PjEscritoSearch extends PjEscrito
{
    /**
     * @inheritdoc
     */
    public $globalSearch;

    public function rules()
    {
        return [
            [['id', 'id_expediente', 'id_sub_expediente'], 'integer'],
            [['fecha', 'escrito','globalSearch'], 'safe'],
            [['notificacion'], 'boolean'],
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
        $query = PjEscrito::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'escrito', $this->globalSearch]);

        return $dataProvider;
    }
}
