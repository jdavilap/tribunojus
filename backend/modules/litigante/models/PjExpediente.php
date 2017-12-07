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
            [['n_expendiente'], 'unique'],
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
            'n_expendiente' => 'EXPEDIENTE',
            'juez' => 'JUEZ',
            'fecha_inicio' => 'FECHA INICIO',
            'observacion' => 'OBSERVACION',
            'materia' => 'MATERIA',
            'etapa_procesal' => 'ETAPA PROCESAL',
            'ubicacion' => 'UBICACION',
            'sumilla' => 'SUMILLA',
            'distrito_judicial' => 'DISTRITO JUDICIAL',
            'proceso' => 'PROCESO',
            'especialidad' => 'ESPECIALIDAD',
            'estado' => 'ESTADO',
            'fecha_conclusion' => 'FECHA CONCLUSION',
            'motivo_conclusion' => 'MOTIVO CONCLUSION',
            'id_cliente' => 'CLIENTE',
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
