<?php

namespace backend\modules\litigante\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\litigante\models\PjAnexo;

/**
 * PjAnexoSearch represents the model behind the search form about `backend\modules\litigante\models\PjAnexo`.
 */
class PjAnexoSearch extends PjAnexo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_escrito'], 'integer'],
            [['anexo', 'fecha'], 'safe'],
            [['notificacion'], 'boolean'],
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
        $query = PjAnexo::find();

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
            'notificacion' => $this->notificacion,
            'id_escrito' => $this->id_escrito,
        ]);

        $query->andFilterWhere(['like', 'anexo', $this->anexo]);

        return $dataProvider;
    }
}
