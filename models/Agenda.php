<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agenda".
 *
 * @property integer $id_agenda
 * @property string $nama_agenda
 * @property string $tanggal
 * @property string $keterangan
 * @property string $tanggal_entry
 * @property integer $update_by
 * @property integer $id_jenis_agenda
 * @property integer $id_sifat_agenda
 * @property integer $id_unit
 *
 * @property JenisAgenda $idJenisAgenda
 * @property SifatAgenda $idSifatAgenda
 * @property Unit $idUnit
 * @property AgendaPeserta[] $agendaPesertas
 * @property DetailAgendaPegawai[] $detailAgendaPegawais
 */
class Agenda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agenda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_agenda', 'tanggal', 'keterangan', 'tanggal_entry', 'update_by', 'id_jenis_agenda', 'id_sifat_agenda', 'id_unit'], 'required'],
            [['tanggal', 'tanggal_entry'], 'safe'],
            [['keterangan'], 'string'],
            [['update_by'], 'string'],
            [['id_jenis_agenda', 'id_sifat_agenda', 'id_unit'], 'integer'],
            [['nama_agenda'], 'string', 'max' => 200],
            [['id_jenis_agenda'], 'exist', 'skipOnError' => true, 'targetClass' => JenisAgenda::className(), 'targetAttribute' => ['id_jenis_agenda' => 'id_jenis_agenda']],
            [['id_sifat_agenda'], 'exist', 'skipOnError' => true, 'targetClass' => SifatAgenda::className(), 'targetAttribute' => ['id_sifat_agenda' => 'id_sifat_agenda']],
            [['id_unit'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['id_unit' => 'id_unit']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_agenda' => 'Id Agenda',
            'nama_agenda' => 'Nama Agenda',
            'tanggal' => 'Tanggal',
            'keterangan' => 'Keterangan',
            'tanggal_entry' => 'Tanggal Entry',
            'update_by' => 'Update By',
            'id_jenis_agenda' => 'Id Jenis Agenda',
            'id_sifat_agenda' => 'Id Sifat Agenda',
            'id_unit' => 'Id Unit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdJenisAgenda()
    {
        return $this->hasOne(JenisAgenda::className(), ['id_jenis_agenda' => 'id_jenis_agenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSifatAgenda()
    {
        return $this->hasOne(SifatAgenda::className(), ['id_sifat_agenda' => 'id_sifat_agenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUnit()
    {
        return $this->hasOne(Unit::className(), ['id_unit' => 'id_unit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaPesertas()
    {
        return $this->hasMany(AgendaPeserta::className(), ['id_agenda' => 'id_agenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailAgendaPegawais()
    {
        return $this->hasMany(DetailAgendaPegawai::className(), ['id_agenda' => 'id_agenda']);
    }
}
