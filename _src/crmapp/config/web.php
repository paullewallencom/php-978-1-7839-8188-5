<?php
return \yii\helpers\ArrayHelper::merge(
    (require __DIR__ . '/overrides/base.php'),
    (require __DIR__ . '/overrides/web_base.php'),
    (require __DIR__ . '/overrides/local.php')
);
