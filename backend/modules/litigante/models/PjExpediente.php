<?php

namespace backend\modules\litigante\models;

use Yii;

/**
 * This is the model class for table "pj_expediente".
 *
 * @property integer $id
 * @property string $n_expendiente
 * @property string $juez
 * @property string $fecha_inicio
 * @property string $observacion
 * @property string $materia
 * @property string $etapa_procesal
 * @property string $ubicacion
 * @property string $sumilla
 * @property string $distrito_judicial
 * @property string $proceso
 * @property string $especialidad
 * @property string $estado
 * @property string $fecha_conclusion
 * @property string $motivo_conclusion
 * @property integer $id_cliente
 *
 * @property PjEscrito[] $pjEscritos
 * @property PjLitigante $idCliente
 * @property PjSubExpediente[] $pjSubExpedientes
 */
class PjExpediente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pj_expediente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['n_expendiente', 'juez', 'fecha_inicio', 'materia', 'etapa_procesal', 'ubicacion', 'sumilla', 'distrito_judicial', 'proceso', 'especialidad', 'estado', 'id_cliente'], 'required'],
            [['fecha_inicio', 'fecha_conclusion'], 'safe'],
            [['id_cliente'], 'integer'],
            [['n_expendiente', 'juez', 'observacion', 'motivo_conclusion'], 'string', 'max' => 255],
            [['materia', 'etapa_procesal', 'ubicacion', 'sumilla', 'distrito_judicial', 'proceso', 'especialidad', 'estado'], 'string', 'max' => 64],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => PjLitigante::className(), 'targetAttribute' => ['id_cliente' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'n_expendiente' => 'N Expendiente (*)',
            'juez' => 'Juez (*)',
            'fecha_inicio' => 'Fecha Inicio (*)',
            'observacion' => 'Observacion',
            'materia' => 'Materia (*)',
            'etapa_procesal' => 'Etapa Procesal (*)',
            'ubicacion' => 'Ubicacion (*)',
            'sumilla' => 'Sumilla (*)',
            'distrito_judicial' => 'Distrito Judicial (*)',
            'proceso' => 'Proceso (*)',
            'especialidad' => 'Especialidad (*)',
            'estado' => 'Estado (*)',
            'fecha_conclusion' => 'Fecha Conclusion',
            'motivo_conclusion' => 'Motivo Conclusion',
            'id_cliente' => 'Id Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPjEscritos()
    {
        return $this->hasMany(PjEscrito::className(), ['id_expediente' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente()
    {
        return $this->hasOne(PjLitigante::className(), ['id' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPjSubExpedientes()
    {
        return $this->hasMany(PjSubExpediente::className(), ['id_expediente' => 'id']);
    }
}
