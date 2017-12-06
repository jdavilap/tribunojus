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
    public function rules()
    {
        return [
            [['id', 'id_cliente'], 'integer'],
            [['n_expendiente', 'juez', 'fecha_inicio', 'observacion', 'materia', 'etapa_procesal', 'ubicacion', 'sumilla', 'distrito_judicial', 'proceso', 'especialidad', 'estado', 'fecha_conclusion', 'motivo_conclusion'], 'safe'],
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
        $query = PjExpediente::find()->where(['id_cliente'=> Yii::$app->user->id]);

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
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_conclusion' => $this->fecha_conclusion,
            'id_cliente' => $this->id_cliente,
        ]);

        $query->andFilterWhere(['like', 'n_expendiente', $this->n_expendiente])
            ->andFilterWhere(['like', 'juez', $this->juez])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'materia', $this->materia])
            ->andFilterWhere(['like', 'etapa_procesal', $this->etapa_procesal])
            ->andFilterWhere(['like', 'ubicacion', $this->ubicacion])
            ->andFilterWhere(['like', 'sumilla', $this->sumilla])
            ->andFilterWhere(['like', 'distrito_judicial', $this->distrito_judicial])
            ->andFilterWhere(['like', 'proceso', $this->proceso])
            ->andFilterWhere(['like', 'especialidad', $this->especialidad])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'motivo_conclusion', $this->motivo_conclusion]);

        return $dataProvider;
    }
}
