<?php

namespace backend\controllers;

use Yii;
use backend\models\Branches;
use backend\models\BranchesSeacrh;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * BranchesController implements the CRUD actions for Branches model.
 */
class BranchesController extends Controller
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
     * Lists all Branches models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BranchesSeacrh();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Branches model.
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
     * Creates a new Branches model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('create-branch')){
            $model = new Branches();
            if ($model->load(Yii::$app->request->post())) {
                $model->branch_create_date= date('y-m-d h:m:s');
                if($model->save()){
                    echo 1;
                }else{
                    echo 0;
                }
                return $this->redirect(['view', 'id' => $model->branch_id]);
            } else {
                return $this->renderAjax('create', [
                    'model' => $model,
                ]);
            }
        }else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing Branches model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->branch_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Branches model.
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
     * Finds the Branches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Branches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Branches::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLists($id)
    {
        $countBranches = Branches::find()
            ->where(['companies_company_id'=>$id])
            ->count();
        $branches = Branches::find()
            ->where(['companies_company_id'=>$id])
            ->all();
        if ($countBranches>0) {
            foreach ($branches as $brach) {
                echo "<option value='".$brach->branch_id."'>".$brach->branch_name."</option>"; 
            }
        } else {
            echo "<option>-</option>";    
        }
    }
}
