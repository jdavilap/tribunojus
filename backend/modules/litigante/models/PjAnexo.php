<?php

namespace backend\modules\litigante\models;

use Yii;

/**
 * This is the model class for table "pj_anexo".
 *
 * @property integer $id
 * @property string $anexo
 * @property integer $fecha
 * @property string $observacion
 * @property boolean $notificacion
 * @property integer $id_escrito
 *
 * @property PjEscrito $idEscrito
 */
class PjAnexo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'pj_anexo';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anexo', 'fecha', 'id_escrito','file'], 'required'],
            [['file'], 'file'],
            [['notificacion'], 'boolean'],
            [['id_escrito','fecha'], 'integer'],
            [['anexo'], 'string', 'max' => 255],
            [['id_escrito'], 'exist', 'skipOnError' => true, 'targetClass' => PjEscrito::className(), 'targetAttribute' => ['id_escrito' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'anexo' => 'ANEXO',
            'fecha' => 'FEHCA',
            'notificacion' => 'NOTIFICACIÓN',
            'id_escrito' => 'ESCRITO',
            'file'=> 'ANEXO',
            'observacion'=> 'OBSERVACIÓN'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEscrito()
    {
        return $this->hasOne(PjEscrito::className(), ['id' => 'id_escrito']);
    }
}
