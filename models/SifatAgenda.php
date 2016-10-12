<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sifat_agenda".
 *
 * @property integer $id_sifat_agenda
 * @property string $nama_sifat_agenda
 *
 * @property Agenda[] $agendas
 */
class SifatAgenda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sifat_agenda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_sifat_agenda'], 'required'],
            [['nama_sifat_agenda'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sifat_agenda' => 'Id Sifat Agenda',
            'nama_sifat_agenda' => 'Nama Sifat Agenda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendas()
    {
        return $this->hasMany(Agenda::className(), ['id_sifat_agenda' => 'id_sifat_agenda']);
    }
}
