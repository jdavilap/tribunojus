<?php

namespace backend\modules\litigante\models;

use Yii;

/**
 * This is the model class for table "pj_escrito".
 *
 * @property integer $id
 * @property integer $fecha
 * @property string $resolucion
 * @property string $escrito
 * @property string $observacion
 * @property string $sumilla
 * @property string $acto
 * @property boolean $bandera
 * @property integer $id_expediente
 * @property integer $id_sub_expediente
 *
 * @property PjAnexo[] $pjAnexos
 * @property PjExpediente $idExpediente
 * @property PjSubExpediente $idSubExpediente
 */
class PjEscrito extends \yii\db\ActiveRecord
{

    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pj_escrito';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'id_expediente', 'id_sub_expediente'], 'integer'],
            [['bandera'], 'boolean'],
            [['file'], 'file','skipOnEmpty' => false],
            [['resolucion'], 'string', 'max' => 64],
            [['escrito', 'observacion', 'sumilla', 'acto'], 'string', 'max' => 255],
            [['id_expediente'], 'exist', 'skipOnError' => true, 'targetClass' => PjExpediente::className(), 'targetAttribute' => ['id_expediente' => 'id']],
            [['id_sub_expediente'], 'exist', 'skipOnError' => true, 'targetClass' => PjSubExpediente::className(), 'targetAttribute' => ['id_sub_expediente' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'resolucion' => 'Resolucion',
            'escrito' => 'Escrito',
            'observacion' => 'Observacion',
            'sumilla' => 'Sumilla',
            'acto' => 'Acto',
            'bandera' => 'Bandera',
            'id_expediente' => 'Id Expediente',
            'id_sub_expediente' => 'Id Sub Expediente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPjAnexos()
    {
        return $this->hasMany(PjAnexo::className(), ['id_escrito' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdExpediente()
    {
        return $this->hasOne(PjExpediente::className(), ['id' => 'id_expediente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSubExpediente()
    {
        return $this->hasOne(PjSubExpediente::className(), ['id' => 'id_sub_expediente']);
    }
}
