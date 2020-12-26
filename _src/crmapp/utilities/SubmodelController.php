<?php

namespace app\utilities;

use Yii;
use app\models\customer\AddressRecord;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class SubmodelController extends Controller
{
    /** @var string Name of the class to be manipulated */
    public $recordClass;

    /** @var string Name of the attribute which will store the given relation ID */
    public $relationAttribute;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Displays a single submodel.
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
     * Creates a new submodel.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param string $relation_id
     * @return mixed
     */
    public function actionCreate($relation_id)
    {
        /** @var ActiveRecord $model */
        $model = new $this->recordClass;
        $model->{$this->relationAttribute} = $relation_id;

        if ($model->load(Yii::$app->request->post()) && $model->save())
            return $this->goBack();

        return $this->render('create', compact('model'));
    }

    /**
     * Updates an existing AddressRecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save())
            return $this->goBack();

        return $this->render('update', compact('model'));
    }

    /**
     * Deletes an existing AddressRecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->goBack();
    }

    /**
     * Finds the AddressRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AddressRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = call_user_func([$this->recordClass, 'findOne'], $id);
        if (!$model)
            throw new NotFoundHttpException('The requested page does not exist.');

        return $model;
    }
}
