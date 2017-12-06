<?php

namespace backend\modules\litigante\models;

use Yii;
use backend\modules\admin\models\PjAbogado;

/**
 * This is the model class for table "pj_litigante".
 *
 * @property integer $id
 * @property string $username
 * @property integer $id_abogado
 *
 * @property PjExpediente[] $pjExpedientes
 * @property PjAbogado $idAbogado
 */
class PjLitigante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pj_litigante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'id_abogado'], 'required'],
            [['id_abogado'], 'integer'],
            [['username'], 'string', 'max' => 255],
            [['username'], 'unique'],
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
            'username' => 'Username',
            'id_abogado' => 'Id Abogado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPjExpedientes()
    {
        return $this->hasMany(PjExpediente::className(), ['id_cliente' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAbogado()
    {
        return $this->hasOne(PjAbogado::className(), ['id' => 'id_abogado']);
    }
}
