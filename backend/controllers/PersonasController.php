<?php

namespace backend\controllers;

use Yii;
use backend\models\Personas;
use backend\models\PersonasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Telefono;
use backend\models\Correos;
use backend\models\Direcciones;
use backend\models\RedesSociales;
use backend\models\Model;

/**use backend\models\Telefono;
 * PersonasController implements the CRUD actions for Personas model.
 */
class PersonasController extends Controller
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
     * Lists all Personas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personas model.
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
     * Creates a new Personas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Personas();
        $modelsTelefono = [new Telefono];
        $modelsCorreo = [new Correos];
        $modelsDireccion = [new Direcciones];
        $modelsRedesSociales = [new RedesSociales];
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $modelsTelefono = Model::createMultiple(Telefono::classname());
            Model::loadMultiple($modelsTelefono, Yii::$app->request->post());

            $modelsCorreo = Model::createMultiple(Correos::classname());
            Model::loadMultiple($modelsCorreo, Yii::$app->request->post());

            $modelsDireccion = Model::createMultiple(Direcciones::classname());
            Model::loadMultiple($modelsDireccion, Yii::$app->request->post());
            
            $modelsRedesSociales = Model::createMultiple(RedesSociales::classname());
            Model::loadMultiple($modelsRedesSociales, Yii::$app->request->post());
            // validate all models

            $valid = $model->validate();
            
            if (true) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsTelefono as $modelTelefono) {
                            $modelTelefono->id_persona = $model->id_personas;
                            if (! ($flag = $modelTelefono->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                        foreach ($modelsCorreo as $modelCorreo) {
                            $modelCorreo->id_persona = $model->id_personas;
                            if (! ($flag = $modelCorreo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                        foreach ($modelsDireccion as $modelDireccion) {
                            $modelDireccion->id_persona = $model->id_personas;
                            if (! ($flag = $modelDireccion->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                        foreach ($modelsRedesSociales as $modelRedesSociales) {
                            $modelRedesSociales->id_persona = $model->id_personas;
                            if (! ($flag = $modelRedesSociales->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id_personas]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            return $this->redirect('view', ['id' => $model->id_personas]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelsTelefono'=>(empty($modelsTelefono)) ? [new Telefono] : $modelsTelefono,
                'modelsCorreo'=>(empty($modelsCorreo)) ? [new Correos] : $modelsCorreo,
                'modelsDireccion'=>(empty($modelsDireccion)) ? [new Direcciones] : $modelsDireccion,
                'modelsRedesSociales'=>(empty($modelsRedesSociales)) ? [new RedesSociales] : $modelsRedesSociales,
            ]);
        }
    }

    /**
     * Updates an existing Personas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_personas]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Personas model.
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
     * Finds the Personas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Personas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Personas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function save($modelos)
    {
        
    }
}
