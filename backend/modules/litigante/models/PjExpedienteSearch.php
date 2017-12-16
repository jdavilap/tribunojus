<?php

namespace backend\modules\litigante\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\litigante\models\PjExpediente;

/**
 * PjExpedienteSearch represents the model behind the search form about `backend\modules\litigante\models\PjExpediente`.
 */
class PjExpedienteSearch extends PjExpediente
{
    /**
     * @inheritdoc
     */
    public $globalSearch;

    public function rules()
    {
        return [
            [['id', 'id_cliente'], 'integer'],
            [['n_expendiente','globalSearch', 'juez', 'fecha_inicio', 'observacion', 'materia', 'etapa_procesal', 'ubicacion', 'sumilla', 'distrito_judicial', 'proceso', 'especialidad', 'estado', 'fecha_conclusion', 'motivo_conclusion'], 'safe'],
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

    public function attributeLabels()
    {
        return [
            'globalSearch' => ''
        ];
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
        $query = PjExpediente::find();

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


        $query->orFilterWhere(['like', 'n_expendiente', $this->globalSearch])
            ->orFilterWhere(['like', 'juez', $this->globalSearch])
            ->orFilterWhere(['like', 'observacion', $this->globalSearch])
            ->orFilterWhere(['like', 'materia', $this->globalSearch])
            ->orFilterWhere(['like', 'etapa_procesal', $this->globalSearch])
            ->orFilterWhere(['like', 'ubicacion', $this->globalSearch])
            ->orFilterWhere(['like', 'sumilla', $this->globalSearch])
            ->orFilterWhere(['like', 'distrito_judicial', $this->globalSearch])
            ->orFilterWhere(['like', 'proceso', $this->globalSearch])
            ->orFilterWhere(['like', 'especialidad', $this->globalSearch])
            ->orFilterWhere(['like', 'estado', $this->globalSearch])
            ->orFilterWhere(['like', 'motivo_conclusion', $this->globalSearch]);

        return $dataProvider;
    }
}
