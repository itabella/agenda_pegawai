<?php

namespace app\controllers;

use Yii;
use app\models\DetailAgendaPegawai;
use app\models\DetailAgendaPegawaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetailAgendaPegawaiController implements the CRUD actions for DetailAgendaPegawai model.
 */
class DetailAgendaPegawaiController extends Controller
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
     * Lists all DetailAgendaPegawai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetailAgendaPegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetailAgendaPegawai model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id,$id_agenda)
    {
        $peserta=DetailAgendaPegawai::find()->where(['id_agenda'=>$id_agenda])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'peserta'=>$peserta,
        ]);
    }

    /**
     * Creates a new DetailAgendaPegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DetailAgendaPegawai();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_detail_agenda, 'id_agenda'=>$model->id_agenda,]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


     public function actionTambah($id_agenda)
    {

        $model = new DetailAgendaPegawai();
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_detail_agenda]);
        } else {
            return $this->render('_formTambahPeserta', [
                'model' => $model,
                'id_agenda'=>$id_agenda,
            ]);
        }
    }

    /**
     * Updates an existing DetailAgendaPegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_detail_agenda]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DetailAgendaPegawai model.
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
     * Finds the DetailAgendaPegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DetailAgendaPegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DetailAgendaPegawai::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
