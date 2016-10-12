<?php

namespace app\controllers;

use Yii;
use app\models\Pegawai;
use app\models\PegawaiSearch;
use app\models\AuthAssignment;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter; 
use yii\web\UploadedFile;


/**
 * PegawaiController implements the CRUD actions for Pegawai model.
 */
class PegawaiController extends Controller
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
     * Lists all Pegawai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pegawai model.
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
     * Creates a new Pegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   public function actionCreate()
    {
        $model = new Pegawai();
        $model2 = new User();
        $model3 = new AuthAssignment();

        $model2->id_pegawai = 0;
        $model3->user_id =0;
        if ($model->load(Yii::$app->request->post()) &&  
            $model2->load(Yii::$app->request->post()) && 
            $model3->load(Yii::$app->request->post())) {
			$model->foto = UploadedFile::getInstance($model, 'foto');
            $dbTrans = Yii::$app->db->beginTransaction();
			if($model->save())
            {
                $model->upload();
                $model2->id_pegawai = $model->id_pegawai;
                $model2->username = $model->nip_nik;
                $model2->password = $model->nip_nik;
                if($model2->save())
                {
                    $model3->user_id = (string)$model2->id;
                    if($model3->save())
                    {
                         $dbTrans->commit();
                    }
                    else
                    {
                        $dbTrans->rollBack();
                    }
                }
                else
                {
                    $dbTrans->rollBack();
                }
            }
            else
            {
                $dbTrans->rollBack();
            }
			
            return $this->redirect(['view', 'id' => $model->id_pegawai]);
        } else {
            return $this->render('create', [
                'pegawai' => $model,
                'user' => $model2,
                'assignment' => $model3,
            ]);
        }
    }

    /**
     * Updates an existing Pegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model2 = User::findOne(['id_pegawai' => $model->id_pegawai]);
        $model3 = AuthAssignment::findOne(['user_id' => $model2->id]);
        if ($model->load(Yii::$app->request->post()) &&  
            $model2->load(Yii::$app->request->post()) && 
            $model3->load(Yii::$app->request->post())) {
            $model->foto = UploadedFile::getInstance($model, 'foto');            
            $dbTrans = Yii::$app->db->beginTransaction();
            if($model->save())
            {
                $model->upload();
                $model2->username = $model->nip_nik;
                $model2->password = $model->nip_nik;
                if($model2->save())
                {
                    if($model3->save())
                    {
                         $dbTrans->commit();
                    }
                    else
                    {
                        $dbTrans->rollBack();
                    }
                }
                else
                {
                    $dbTrans->rollBack();
                }
            }
            else
            {
                $dbTrans->rollBack();
            }
            return $this->redirect(['view', 'id' => $model->id_pegawai]);
        } else {
             if($model->foto){
                $imagepath ='uploads';
                $model->foto=$imagepath.'/'.$model->foto;
            } 
            return $this->render('update', [
               'pegawai' => $model,
                'user' => $model2,
                'assignment' => $model3,
            ]);
        }
    }


    public function actionDeletefoto($id)
    {
        $foto=Pegawai::find()->where(['id_pegawai'=>$id])->one()->foto;
        if($foto){
            if(!unlink(Yii::getAlias('@webroot/uploads/').$foto))
            {
                return false;
            }
        }

        $pegawai = Pegawai::findOne($id);
        $pegawai->foto=NULL;
        $pegawai->update();

        return $this->redirect(['update','id'=>$id]);
    }

    /**
     * Deletes an existing Pegawai model.
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
     * Finds the Pegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pegawai::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
