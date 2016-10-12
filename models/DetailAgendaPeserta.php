<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "detail_agenda_peserta".
 *
 * @property integer $id_detail_agenda_peserta
 * @property integer $id_agenda_peserta
 * @property integer $id_pegawai
 *
 * @property AgendaPeserta $idAgendaPeserta
 * @property Pegawai $idPegawai
 */
class DetailAgendaPeserta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_agenda_peserta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_agenda_peserta', 'id_pegawai'], 'required'],
            [['id_agenda_peserta', 'id_pegawai'], 'integer'],
            [['id_agenda_peserta'], 'exist', 'skipOnError' => true, 'targetClass' => AgendaPeserta::className(), 'targetAttribute' => ['id_agenda_peserta' => 'id_agenda_peserta']],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_detail_agenda_peserta' => 'Id Detail Agenda Peserta',
            'id_agenda_peserta' => 'Id Agenda Peserta',
            'id_pegawai' => 'Id Pegawai',
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
    public function getIdPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }

    public function ruang($id_agenda_peserta)
    {
        $ruang= AgendaPeserta::find()->select(['ruang.id_ruang','nama_aktivitas', 'tanggal', 'nama_ruang'])->joinWith('idRuang')->where(['id_agenda_peserta'=> $id_agenda_peserta])->asArray()->one();
    }

    public static function checkPeserta($id_agenda_peserta, $id_peserta)
    {
      $tanggal = AgendaPeserta::find()->select(['waktu_mulai', 'waktu_selesai'])->where(['id_agenda_peserta' => $id_agenda_peserta])->asArray()->one();
      $check = self::find()->select(['detail_agenda_peserta.id_agenda_peserta', 'pegawai.id_pegawai','nama_pegawai', 'nama_aktivitas', 'waktu_mulai', 'waktu_selesai'])
          ->joinWith('idAgendaPeserta')
		  ->joinWith('idPegawai')
          ->andWhere("waktu_selesai >='".$tanggal['waktu_mulai']."'")
          ->andWhere("waktu_mulai <='".$tanggal['waktu_selesai']."'")
          ->asArray()
          ->all();
		  $result = ArrayHelper::index($check, 'id_pegawai');
      if($check != null)
      {
		$cek = array_intersect($id_peserta, array_keys($result));
		//print_r($cek);
		if(sizeof($cek) > 0)
        {
			$tampung = array();
			foreach($cek as $row)
			{
				$tampung[] = $result[$row];
			}
          return $tampung;
        }
      }
      return true;
    }
}
