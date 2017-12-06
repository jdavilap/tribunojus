<?php

namespace backend\modules\litigante\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\litigante\models\PjSubExpediente;

/**
 * PjSubExpedienteSearch represents the model behind the search form about `backend\modules\litigante\models\PjSubExpediente`.
 */
class PjSubExpedienteSearch extends PjSubExpediente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_expediente'], 'integer'],
            [['sub_expediente'], 'safe'],
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
        $query = PjSubExpediente::find();

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
            'id_expediente' => $this->id_expediente,
        ]);

        $query->andFilterWhere(['like', 'sub_expediente', $this->sub_expediente]);

        return $dataProvider;
    }
}
