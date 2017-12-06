<?php

namespace backend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "pj_abogado".
 *
 * @property integer $id
 * @property string $username
 *
 * @property PjLitigante[] $pjLitigantes
 */
class PjAbogado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pj_abogado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username'], 'string', 'max' => 64],
            [['username'], 'unique'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPjLitigantes()
    {
        return $this->hasMany(PjLitigante::className(), ['id_abogado' => 'id']);
    }
}
