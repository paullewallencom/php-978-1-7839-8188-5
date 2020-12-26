<?php
/**
 * Configuration file for the "yii asset" console command.
 * Note that in the console environment, some path aliases like '@webroot' and '@web' may not exist.
 * Please define these missing path aliases.
 */
return [
    // Adjust command/callback for JavaScript files compressing:
    'jsCompressor' => 'java -jar assets/compression/compiler.jar --js {from} --js_output_file {to}',
    // Adjust command/callback for CSS files compressing:
    'cssCompressor' => 'java -jar assets/compression/yuicompressor.jar --type css {from} -o {to}',
    // The list of asset bundles to compress:
    'bundles' => [
        'app\assets\ApplicationUiAssetBundle',
        'yii\widgets\ActiveFormAsset',
        'yii\grid\GridViewAsset',
        'yii\validators\ValidationAsset',
    ],
    // Asset bundle for compression output:
    'targets' => [
        'app\assets\AllAsset' => [
            'basePath' => realpath(__DIR__ . '/../../web'),
            'baseUrl' => '/',
            'js' => 'compiled-assets/all-{hash}.js',
            'css' => 'compiled-assets/all-{hash}.css',
        ],
    ],
    // Asset manager configuration:
    'assetManager' => [
        'basePath' => realpath(__DIR__ . '/../../web/assets'),
        'baseUrl'  => '/assets',
    ],
];