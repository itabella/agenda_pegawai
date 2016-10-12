<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "detail_agenda_pegawai".
 *
 * @property integer $id_detail_agenda
 * @property integer $id_agenda
 * @property integer $id_pegawai
 * @property integer $kode_tugas
 *
 * @property Agenda $idAgenda
 * @property Pegawai $idPegawai
 * @property Tugas $kodeTugas
 */
class DetailAgendaPegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_agenda_pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_agenda', 'id_pegawai', 'kode_tugas'], 'required'],
            [['id_agenda', 'id_pegawai', 'kode_tugas'], 'integer'],
            [['id_agenda'], 'exist', 'skipOnError' => true, 'targetClass' => Agenda::className(), 'targetAttribute' => ['id_agenda' => 'id_agenda']],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
            [['kode_tugas'], 'exist', 'skipOnError' => true, 'targetClass' => Tugas::className(), 'targetAttribute' => ['kode_tugas' => 'kode_tugas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_detail_agenda' => 'Id Detail Agenda',
            'id_agenda' => 'Id Agenda',
            'id_pegawai' => 'Id Pegawai',
            'kode_tugas' => 'Kode Tugas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAgenda()
    {
        return $this->hasOne(Agenda::className(), ['id_agenda' => 'id_agenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }

   

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeTugas()
    {
        return $this->hasOne(Tugas::className(), ['kode_tugas' => 'kode_tugas']);
    }
}
