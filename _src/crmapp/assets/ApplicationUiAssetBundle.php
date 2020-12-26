<?php
/**
 * Created by PhpStorm.
 * User: Hijarian
 * Date: 12.07.14
 * Time: 21:40
 */
namespace app\assets;

use yii\web\AssetBundle;

class ApplicationUiAssetBundle extends AssetBundle
{
    public $sourcePath = '@app/assets/ui';
    public $css = [
        'css/main.css'
    ];
    public $js = [
        'js/main.js'
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'yii\web\YiiAsset',
        'app\assets\AuditColumnAssetsBundle'
    ];
}
