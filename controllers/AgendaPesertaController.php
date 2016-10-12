<?php

namespace app\controllers;

use Yii;
use app\models\AgendaPeserta;
use app\models\AgendaPesertaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Unit;
use app\models\Agenda;
use app\models\RUang;
use yii\data\ActiveDataProvider;

/**
 * AgendaPesertaController implements the CRUD actions for AgendaPeserta model.
 */
class AgendaPesertaController extends Controller
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
     * Lists all AgendaPeserta models.
     * @return mixed
     */
    public function actionIndex()
    {
       // echo Yii::$app->user->identity->id;exit;
		$searchModel = new AgendaPesertaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

	public function actionIndexDate()
    {
        $agenda = AgendaPeserta::find()->select('agenda_peserta.*')->joinWith('detailAgendaPesertas');
        if(Yii::$app->session->get('user.level') === 'peserta')
            $agenda = $agenda->where(['detail_agenda_peserta.id_pegawai' => Yii::$app->user->identity->id_pegawai]);
        if(Yii::$app->session->get('user.level') === 'Operator Unit')
            $agenda = $agenda->where(['agenda_peserta.id_unit' => Yii::$app->session->get('user.unit')]);
        $agenda = $agenda->all();
        $events = array();
        foreach($agenda as $row)
        {
            $Event = new \yii2fullcalendar\models\Event();
              $Event->id = $row->id_agenda_peserta;
              $Event->title = $row->nama_aktivitas;
              $Event->start = $row->waktu_mulai;
              $Event->end = $row->waktu_selesai;
              $events[] = $Event;
        }

        return $this->render('index-date', [
            'events' => $events,
        ]);
    }


    

	public function actionDetail($date)
	{
	    $dataProvider = AgendaPeserta::find()->select('agenda_peserta.*')->joinWith('detailAgendaPesertas')->where("waktu_mulai LIKE '".$date."%' OR waktu_selesai LIKE '".$date."%'");
        if(Yii::$app->session->get('user.level') === 'peserta')
            $dataProvider = $dataProvider->where(['detail_agenda_peserta.id_pegawai' => Yii::$app->user->identity->id_pegawai]);
        if(Yii::$app->session->get('user.level') === 'Operator Unit')
            $dataProvider = $dataProvider->where(['agenda_peserta.id_unit' => Yii::$app->session->get('user.unit')]);

        $dataProvider = new ActiveDataProvider([
                        'query' => $dataProvider,
                        'pagination' => false]);
        return $this->renderAjax('detail_per_date', [
            'dataProvider' => $dataProvider,
        ]);
	}

    /**
     * Displays a single AgendaPeserta model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AgendaPeserta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AgendaPeserta();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_agenda_peserta]);
        } else {
          $model->waktu_mulai = date('Y-m-d H:i:s');
          $model->waktu_selesai = date('Y-m-d H:i:s');
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AgendaPeserta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_agenda_peserta]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Deletes an existing AgendaPeserta model.
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
     * Finds the AgendaPeserta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AgendaPeserta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AgendaPeserta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
