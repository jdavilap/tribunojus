<?php

namespace backend\modules\litigante\models;

use backend\modules\admin\models\User;
use Yii;
use backend\modules\admin\models\PjAbogado;

/**
 * This is the model class for table "pj_mensaje".
 *
 * @property integer $id
 * @property integer $fecha
 * @property boolean $status
 * @property string $asunto
 * @property string $contenido
 * @property string $receptor
 * @property integer $id_abogado
 * @property integer $id_litigante
 *
 * @property PjAbogado $idAbogado
 */
class PjMensaje extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pj_mensaje';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'boolean'],
            [['asunto', 'contenido', 'id_abogado', 'id_litigante', 'fecha'], 'required'],
            [['id_abogado', 'id_litigante', 'fecha'], 'integer'],
            [['asunto', 'contenido', 'receptor'], 'string', 'max' => 255],
            [['id_abogado'], 'exist', 'skipOnError' => true, 'targetClass' => PjAbogado::className(), 'targetAttribute' => ['id_abogado' => 'id']],
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
            'status' => 'Status',
            'asunto' => 'Asunto',
            'contenido' => 'Contenido',
            'id_abogado' => 'Id Abogado',
            'id_litigante' => 'Enviar a: ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAbogado()
    {
        return $this->hasOne(PjAbogado::className(), ['id' => 'id_abogado']);
    }

    public static function getCountMensajeActivo($username)
    {
        $result = '';
        if (PjAbogado::findOne(['username' => $username])) {
            $result = PjMensaje::find()->where(['id_abogado' => PjAbogado::findOne(['username' => $username])->id, 'status' => true, 'receptor' => 'abogado'])->count();
        } elseif (PjLitigante::findOne(['username' => $username])) {
            $result = PjMensaje::find()->where(['id_litigante' => PjLitigante::findOne(['username' => $username])->id, 'status' => true, 'receptor' => 'litigante'])->count();
        } else {
            $result = 0;
        }

        return $result;
    }

    public static function getTitleviewmessage($id)
    {
        $title = '';

        $mensaje = PjMensaje::findOne(['id' => $id]);

        if ($mensaje->receptor == 'abogado') {
            $title = User::findOne(['username' => PjLitigante::findOne(['id' => $mensaje->id_litigante])->username])->first_name . ' ' . User::findOne(['username' => PjLitigante::findOne(['id' => $mensaje->id_litigante])->username])->last_name;
        } else {
            $title ='Lic. '. User::findOne(['username' => PjAbogado::findOne(['id' => $mensaje->id_abogado])->username])->first_name . ' ' . User::findOne(['username' => PjAbogado::findOne(['id' => $mensaje->id_abogado])->username])->last_name;
        }

        return $title;

    }
}
