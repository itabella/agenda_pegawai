<?php
namespace app\component;

use Yii;

class KalkunSmsService {

    private $nomor_hp;
    private $pesan;
    private $base_url;

    public function __construct() {
       //  $this->nomor_hp = $nomor_hp;
       // $this->pesan = $pesan;
      // $this->base_url = Yii::$app->params['https://smsgateway.uns.ac.id/'];
        $this->base_url = "https://smsgateway.uns.ac.id/index.php";
   
}
    public function kirimSms($nomor_hp, $pesan) {
       // $client = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
        $client = new \GuzzleHttp\Client(['base_url' => $this->base_url]);
        //file_getcontents($url);
        try {
            // $url = "https://smsgateway.uns.ac.id/index.php/plugin/rest_api/send_sms?phoneNumber=08991996152&message=ini coba 1 -upt tekinfokom-";
            // $response = $client->get("/plugin/rest_api/send_sms", [
            //     'phoneNumber' => $nomor_hp,
            //     'message' => $pesan,
            // ]);
            $url = $this->base_url . "/plugin/rest_api/send_sms?phoneNumber=$nomor_hp&message=$pesan";
            $response = file_get_contents($url);

           // Yii::info(print_r($response, true));
           // Yii::info($url);

            //$client->setHttpClient($guzzleClient);
            
        } catch (\yii\base\ErrorException $ex) {
            Yii::error($ex->getMessage());
            Yii::error($ex->getTraceAsString());
        }
    }
}
?>