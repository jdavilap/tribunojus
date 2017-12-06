<?php

namespace backend\modules\litigante\models;

use Yii;

/**
 * This is the model class for table "pj_sub_expediente".
 *
 * @property integer $id
 * @property integer $id_expediente
 * @property string $sub_expediente
 *
 * @property PjEscrito[] $pjEscritos
 * @property PjExpediente $idExpediente
 */
class PjSubExpediente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pj_sub_expediente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_expediente', 'sub_expediente'], 'required'],
            [['id_expediente'], 'integer'],
            [['sub_expediente'], 'string', 'max' => 255],
            [['id_expediente'], 'exist', 'skipOnError' => true, 'targetClass' => PjExpediente::className(), 'targetAttribute' => ['id_expediente' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_expediente' => 'Id Expediente',
            'sub_expediente' => 'Sub Expediente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPjEscritos()
    {
        return $this->hasMany(PjEscrito::className(), ['id_sub_expediente' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdExpediente()
    {
        return $this->hasOne(PjExpediente::className(), ['id' => 'id_expediente']);
    }
}
