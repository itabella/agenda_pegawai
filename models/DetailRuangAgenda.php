<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_ruang_agenda".
 *
 * @property integer $id_detail_ruang_agenda
 * @property integer $id_agenda_peserta
 * @property integer $id_ruang
 *
 * @property AgendaPeserta $idAgendaPeserta
 * @property Ruang $idRuang
 */
class DetailRuangAgenda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_ruang_agenda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_agenda_peserta', 'id_ruang'], 'required'],
            [['id_agenda_peserta', 'id_ruang'], 'integer'],
            [['id_agenda_peserta'], 'exist', 'skipOnError' => true, 'targetClass' => AgendaPeserta::className(), 'targetAttribute' => ['id_agenda_peserta' => 'id_agenda_peserta']],
            [['id_ruang'], 'exist', 'skipOnError' => true, 'targetClass' => Ruang::className(), 'targetAttribute' => ['id_ruang' => 'id_ruang']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_detail_ruang_agenda' => 'Id Detail Ruang Agenda',
            'id_agenda_peserta' => 'Id Agenda Peserta',
            'id_ruang' => 'Id Ruang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAgendaPeserta()
    {
        return $this->hasOne(AgendaPeserta::className(), ['id_agenda_peserta' => 'id_agenda_peserta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRuang()
    {
        return $this->hasOne(Ruang::className(), ['id_ruang' => 'id_ruang']);
    }
}
