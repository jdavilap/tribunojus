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

    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'fecha', 'id_expediente', 'id_sub_expediente'], 'integer'],
            [['resolucion', 'escrito', 'observacion', 'sumilla', 'acto','globalSearch'], 'safe'],
            [['bandera'], 'boolean'],
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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha' => $this->fecha,
            'bandera' => $this->bandera,
            'id_expediente' => $this->id_expediente,
            'id_sub_expediente' => $this->id_sub_expediente,
        ]);

        $query->andFilterWhere(['like', 'resolucion', $this->resolucion])
            ->andFilterWhere(['like', 'escrito', $this->escrito])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'sumilla', $this->sumilla])
            ->andFilterWhere(['like', 'acto', $this->acto]);

        return $dataProvider;
    }
}
