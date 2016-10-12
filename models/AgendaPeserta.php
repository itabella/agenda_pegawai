<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agenda_peserta".
 *
 * @property integer $id_agenda_peserta
 * @property string $nama_aktivitas
 * @property string $tanggal
 * @property string $keterangan
 * @property string $tanggal_entry
 * @property integer $update_by
 * @property integer $id_agenda
 * @property integer $id_unit
 *
 * @property Agenda $idAgenda
 * @property Unit $idUnit
 * @property DetailAgendaPeserta[] $detailAgendaPesertas
 * @property DetailRuangAgenda[] $detailRuangAgendas
 */
class AgendaPeserta extends \yii\db\ActiveRecord
{
  public $kvdate1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agenda_peserta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_aktivitas', 'keterangan', 'tanggal_entry', 'update_by', 'id_agenda', 'id_unit', 'id_ruang'], 'required'],
            [['waktu_mulai','waktu_selesai', 'tanggal_entry'], 'safe'],
            [['keterangan'], 'string'],
            [['update_by'], 'string'],
            [['id_agenda', 'id_unit', 'id_ruang'], 'integer'],
            [['nama_aktivitas'], 'string', 'max' => 100],
            [['id_agenda'], 'exist', 'skipOnError' => true, 'targetClass' => Agenda::className(), 'targetAttribute' => ['id_agenda' => 'id_agenda']],
            [['id_unit'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['id_unit' => 'id_unit']],
            [['id_ruang'], 'exist', 'skipOnError' => true, 'targetClass' => Ruang::className(), 'targetAttribute' => ['id_ruang' => 'id_ruang']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_agenda_peserta' => 'Id Agenda Peserta',
            'nama_aktivitas' => 'Nama Aktivitas',
            'tanggal' => 'Tanggal',
            'keterangan' => 'Keterangan',
            'tanggal_entry' => 'Tanggal Entry',
            'update_by' => 'Update By',
            'id_agenda' => 'Id Agenda',
            'id_unit' => 'Id Unit',
            'id_ruang' => 'Id Ruang',
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
    public function getIdUnit()
    {
        return $this->hasOne(Unit::className(), ['id_unit' => 'id_unit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailAgendaPesertas()
    {
        return $this->hasMany(DetailAgendaPeserta::className(), ['id_agenda_peserta' => 'id_agenda_peserta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailRuangAgendas()
    {
        return $this->hasMany(DetailRuangAgenda::className(), ['id_agenda_peserta' => 'id_agenda_peserta']);
    }

    public function getIdRuang()
    {
        return $this->hasOne(Ruang::className(), ['id_ruang' => 'id_ruang']);
    }
}
