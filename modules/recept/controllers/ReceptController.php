<?php

namespace app\modules\recept\controllers;

use app\modules\ingredient\models\Ingredients;
use app\modules\recept\models\IngToRecept;
use app\modules\recept\models\SearchForm;
use Yii;
use app\modules\recept\models\Recept;
use app\modules\recept\models\ReceptSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * ReceptController implements the CRUD actions for Recept model.
 */
class ReceptController extends Controller
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
     * Lists all Recept models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReceptSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Lists all Recept models.
     * @return mixed
     */
    public function actionIndexSite()
    {
        $ingredients=ArrayHelper::map(Ingredients::find()->asArray()->all(),'id','name');
        $model=new SearchForm();
        $recept=Recept::find()->with('ingredients');
        $receptDataProvider = new ActiveDataProvider([
            'query' => $recept,
            'pagination' => [
                'pageSize' => 24,
            ],
        ]);
        if ($model->load(Yii::$app->request->post())){
            return var_dump(Yii::$app->request->post());
        }
        return $this->render('indexsite', [
            'dataProvider' => $receptDataProvider,
            'ingredients'   =>$ingredients,
            'model'         =>  $model
        ]);
    }
    

    /**
     * Creates a new Recept model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Recept();
        $ingrediets=ArrayHelper::map(Ingredients::find()->asArray()->all(),'id','name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $inToRec=new IngToRecept();
            $post=Yii::$app->request->post();
            $inToRec->saveRec($post['Recept']['idIngredients'],$model->id);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'ingrediets'=>$ingrediets
            ]);
        }
    }

    /**
     * Updates an existing Recept model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $value=array();
        foreach ($model->ingredients as $ingredient){
            $value[]=$ingredient->id;
        }
        $ingrediets=ArrayHelper::map(Ingredients::find()->asArray()->all(),'id','name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $inToRec=new IngToRecept();
            $post=Yii::$app->request->post();
            $inToRec->saveRec($post['Recept']['idIngredients'],$model->id);
            
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ingrediets'=>$ingrediets,
                'value' =>$value
            ]);
        }
    }

    /**
     * Deletes an existing Recept model.
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
     * Finds the Recept model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Recept the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recept::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
