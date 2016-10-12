<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property integer $id_pegawai
 * @property string $nama_pegawai
 * @property string $alamat_pegawai
 * @property string $no_hp
 * @property string $foto
 * @property integer $kode_jabatan
 * @property integer $id_unit
 *
 * @property Jabatan $kodeJabatan
 * @property Unit $idUnit
 */
class Pegawai extends \yii\db\ActiveRecord 
{
    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_pegawai', 'nip_nik','alamat_pegawai', 'no_hp', 'foto', 'kode_jabatan', 'id_unit'], 'required'],
            [['kode_jabatan', 'id_unit'], 'integer'],
            [['nama_pegawai', 'alamat_pegawai'], 'string', 'max' => 200],
            [['nip_nik'], 'integer'],
            [['no_hp'], 'string', 'max' => 20],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['kode_jabatan'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['kode_jabatan' => 'kode_jabatan']],
            [['id_unit'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['id_unit' => 'id_unit']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'Id Pegawai',
            'nama_pegawai' => 'Nama Pegawai',
            'nip_nik' => 'NIP_NIK',
            'alamat_pegawai' => 'Alamat Pegawai',
            'no_hp' => 'No Hp',
            'foto' => 'Foto',
            'kode_jabatan' => 'Kode Jabatan',
            'id_unit' => 'Id Unit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeJabatan()
    {
        return $this->hasOne(Jabatan::className(), ['kode_jabatan' => 'kode_jabatan']);
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
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id_pegawai' => 'id_pegawai']);
    }
	
	 public function upload()
    {
        if ($this->validate()) {
            $this->foto->saveAs('uploads/' . $this->foto->baseName . '.' . $this->foto->extension);
            return true;
        } else {
            return false;
        }
    }
}
