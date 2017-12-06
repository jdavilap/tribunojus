<?php

namespace backend\modules\litigante\models;

use Yii;

/**
 * This is the model class for table "pj_escrito".
 *
 * @property integer $id
 * @property string $fecha
 * @property string $escrito
 * @property boolean $notificacion
 * @property integer $id_expediente
 * @property integer $id_sub_expediente
 *
 * @property PjAnexo[] $pjAnexos
 * @property PjExpediente $idExpediente
 * @property PjSubExpediente $idSubExpediente
 */
class PjEscrito extends \yii\db\ActiveRecord
{
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
            [['fecha'], 'required'],
            [['fecha'], 'safe'],
            [['notificacion'], 'boolean'],
            [['id_expediente', 'id_sub_expediente'], 'integer'],
            [['escrito'], 'string', 'max' => 255],
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
            'escrito' => 'Escrito',
            'notificacion' => 'Notificacion',
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
