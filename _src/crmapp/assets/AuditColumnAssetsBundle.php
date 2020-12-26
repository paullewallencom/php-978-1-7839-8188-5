<?php
/**
 * Created by PhpStorm.
 * User: Hijarian
 * Date: 03.08.14
 * Time: 12:59
 */

namespace app\assets;

use yii\web\AssetBundle;

class AuditColumnAssetsBundle extends AssetBundle
{
    public $sourcePath = '@app/assets/audit-column';
    public $css = [
        'styles.css'
    ];
    public $js = [
        'scripts.js'
    ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
