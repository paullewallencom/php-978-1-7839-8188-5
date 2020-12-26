<?php
/**
 * Created by PhpStorm.
 * User: Hijarian
 * Date: 12.07.14
 * Time: 20:05
 */

namespace app\utilities;

use yii\helpers\Markdown;
use yii\base\ViewRenderer;

class MarkdownRenderer extends ViewRenderer
{
    public function render($view, $file, $params)
    {
        return Markdown::process(file_get_contents($file));
    }
}
