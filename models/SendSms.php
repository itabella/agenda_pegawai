<?php 

namespace app\models;
use Yii;
use yii\base\Model;

class SendSms extends Model
{
	public $number;
    public $text = 'Diberitahukan Kepada saudara @nama untuk dapat menghadiri kegiatan @aktivitas pada tanggal @tanggal diruang @ruang';
	
	public function attributeLabels()
    {
        return [
            'number' => 'Kontak',
            'text' => 'Isi Pesan',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['number','text'], 'required'],
        ];
    }
	
	public function kirimSms() 
	{
        $client = new \GuzzleHttp\Client();
		$contacts = Pegawai::find()->select(['no_hp', 'nama_pegawai'])->where(['id_pegawai'=>$this->number])->all();
		foreach ($contacts as $nomor_hp){
			$request = new \GuzzleHttp\Psr7\Request('GET','https://smsgateway.uns.ac.id/index.php/plugin/rest_api/send_sms?phoneNumber='.$nomor_hp->no_hp.'&message='.str_ireplace('@nama',$nomor_hp->nama_pegawai,$this->text));
		//$client->send($request, ['exceptions'=>false]);
		 \GuzzleHttp\Pool::batch($client, $request, ['options' => ['exceptions'=>false]]);
        }
    }
	
	public function loadMessage($id_agenda_peserta)
	{
		$ket = AgendaPeserta::find()->select(['ruang.id_ruang','nama_aktivitas', 'waktu_mulai', 'nama_ruang'])->joinWith('idRuang')->where(['id_agenda_peserta'=> $id_agenda_peserta])->asArray()->one();
		$patterns = array();
		$patterns[0] = '/(@aktivitas)/';
		$patterns[1] = '/(@tanggal)/';
		$patterns[2] = '/(@ruang)/';
		$replacements = array();
		$replacements[2] = $ket['nama_aktivitas'];
		$replacements[1] = $ket['waktu_mulai'];
		$replacements[0] = $ket['nama_ruang'];
		$this->text = preg_replace($patterns, $replacements, $this->text);
	}
}