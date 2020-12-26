<?php
/**
 * Created by PhpStorm.
 * User: Hijarian
 * Date: 12.07.14
 * Time: 22:26
 */

namespace app\assets;


use yii\web\AssetBundle;

class SnowAssetsBundle extends AssetBundle
{
    public $sourcePath = '@app/assets/snow';
    public $css = ['snow.css'];
    public $depends = ['app\\assets\\ApplicationUiAssetBundle'];
}
