<?php
/**
 * Created by PhpStorm.
 * User: Hijarian
 * Date: 21.07.14
 * Time: 10:10
 */

namespace app\api\controllers;

use app\models\service\ServiceRecord;
use app\utilities\YamlResponseFormatter;
use yii\web\Controller;
use Yii;
use yii\web\Response;

class ServicesController extends Controller
{
    public function actionJson()
    {
        $models = ServiceRecord::find()->all();
        $data = array_map(function ($model) {return $model->attributes;}, $models);

        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = $data;

        return $response;
    }

    public function actionYaml()
    {
        $models = ServiceRecord::find()->all();
        $data = array_map(function ($model) {return $model->attributes;}, $models);

        $response = Yii::$app->response;
        $response->format = YamlResponseFormatter::FORMAT;
        $response->data = $data;

        return $response;
    }
}
