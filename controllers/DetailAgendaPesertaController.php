<?php

namespace app\controllers;

use Yii;
use app\models\DetailAgendaPeserta;
use app\models\DetailAgendaPesertaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Pegawai;
use app\models\AgendaPeserta;
use mPDF;
use yii\base\DynamicModel;
use app\component\KalkunSmsService;


/**
 * DetailAgendaPesertaController implements the CRUD actions for DetailAgendaPeserta model.
 */
class DetailAgendaPesertaController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DetailAgendaPeserta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetailAgendaPesertaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetailAgendaPeserta model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id,$id_agenda_peserta)
     {
        $peserta=DetailAgendaPeserta::find()->where(['id_agenda_peserta'=>$id_agenda_peserta])->addGroupBy('id_pegawai')->all();
        $ruang=AgendaPeserta::find()->select(['ruang.id_ruang','nama_aktivitas', 'waktu_mulai', 'waktu_selesai', 'nama_ruang'])->joinWith('idRuang')->where(['id_agenda_peserta'=> $id_agenda_peserta])->asArray()->one();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'peserta'=>$peserta,
            'ruang'=>$ruang,
        ]);
    }

    //untuk cetak MPDF
   public function actionPdfreport($id,$id_agenda_peserta ) {
         $peserta=DetailAgendaPeserta::find()->where(['id_agenda_peserta'=>$id_agenda_peserta])->addGroupBy('id_pegawai')->all();

        $mpdf= new mPDF;
        $mpdf->WriteHTML($this->renderPartial('cetakPresensi', [
            'model' => $this->findModel($id),
           'peserta'=>$peserta,
            ]));
        $mpdf->Output();
        exit;
    }


    /*buat kirim sms ya  actionKirimSms dan actionForm*/


    public function actionInputSms()
    {
       //return $this->render('createsms');

        $model = new DynamicModel([
            'nomor_hp', 'pesan'
        ]);
          $model->addRule(['nomor_hp', 'pesan'], 'string', ['max' => 128]);

        $postParam = Yii::$app->request->post('DynamicModel');
        $nomor_hp = $postParam['nomor_hp'];
        $pesan = $postParam['pesan'];

        // echo $pesan;
        // exit(1);

        // $nomor_hp=Yii::$app->request->post('nomor_hp');
        // $pesan=Yii::$app->request->post('pesan');
        $kirim= new KalkunSmsService($nomor_hp, $pesan);

            if($model->load(Yii::$app->request->post())){
                // do somenthing with model
                $kirim->kirimSms($nomor_hp, $pesan);
                echo 'terkirim';
                // return $this->redirect('view', ['id' => $model->id, 'id_agenda_peserta' => $model->id_agenda_peserta]);
            }
            return $this->render('createsms', ['model'=>$model]);
    }


    public function actionSendSms($id_agenda_peserta)
    {
        $model = new \app\models\SendSms();
		$model->loadMessage($id_agenda_peserta);
            if($model->load(Yii::$app->request->post())){
                // do somenthing with model

                $model->kirimSms();
                //exit;
                return $this->redirect('index');
            }
        $data = DetailAgendaPeserta::find()->select('pegawai.id_pegawai, nama_pegawai')->joinWith('idPegawai')->where(['id_agenda_peserta' => $id_agenda_peserta])->asArray()->all();
        $model->number = yii\helpers\ArrayHelper::getColumn($data,'id_pegawai');
        return $this->render('createsms', ['model'=>$model, 'data' => $data]);
    }

    /**
     * Creates a new DetailAgendaPeserta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DetailAgendaPeserta();
        $modelAgendaPesertas = [new AgendaPeserta];
        $modelsPegawai = [new Pegawai];
		$errors = null;
		
        if (Yii::$app->request->post()) {
            $data=Yii::$app->request->post('DetailAgendaPeserta');
            $cek = DetailAgendaPeserta::checkPeserta($data['id_agenda_peserta'],$data['id_pegawai']);
			if($cek === true)
            {
              $this->simpan($data);
              return $this->redirect(['index']);
            }else{
              foreach($cek as $row){
			  echo "error. pegawai atas nama ".$row['nama_pegawai']." telah mengikuti aktivitas ".$row['nama_aktivitas']." pada tanggal ".$row['waktu_mulai']." sampai ".$row['waktu_selesai'].". </br>";
			  }
			  exit;
            }
        } 
            return $this->render('create', [
                'model' => $model,
				'errors' => $errors, 
                'modelsPegawai' => (empty($modelsPegawai)) ? [new Pegawai] : $modelsPegawai,
                'modelAgendaPesertas' => (empty($modelAgendaPesertas)) ? [new AgendaPeserta] : $modelAgendaPesertas,
            ]);
    }

    public function simpan($data)
    {
        $id_agenda=$data['id_agenda_peserta'];
        $id_pegawai=$data['id_pegawai'];
        foreach ($id_pegawai as $id)
        {
            $Peserta= new DetailAgendaPeserta();
            $Peserta->id_agenda_peserta=$id_agenda;
            $Peserta->id_pegawai=$id;
            $Peserta->save();
        }
    }

    /**
     * Updates an existing DetailAgendaPeserta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         $modelAgendaPesertas = [new AgendaPeserta];
        $modelsPegawai = [new Pegawai];

        if ($model->load(Yii::$app->request->post())) {
             $this->simpan();
            //return $this->redirect(['view', 'id' => $model->id_detail_agenda_peserta]);
             return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelsPegawai' => (empty($modelsPegawai)) ? [new Pegawai] : $modelsPegawai,
                 'modelAgendaPesertas' => (empty($modelAgendaPesertas)) ? [new AgendaPeserta] : $modelAgendaPesertas,
            ]);
        }
    }

    /**
     * Deletes an existing DetailAgendaPeserta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DetailAgendaPeserta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DetailAgendaPeserta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DetailAgendaPeserta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}
