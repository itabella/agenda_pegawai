<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_agenda".
 *
 * @property integer $id_jenis_agenda
 * @property string $jenis_agenda
 *
 * @property Agenda[] $agendas
 */
class JenisAgenda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_agenda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_agenda'], 'required'],
            [['jenis_agenda'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jenis_agenda' => 'Id Jenis Agenda',
            'jenis_agenda' => 'Jenis Agenda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendas()
    {
        return $this->hasMany(Agenda::className(), ['id_jenis_agenda' => 'id_jenis_agenda']);
    }
}
