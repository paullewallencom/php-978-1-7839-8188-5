<?php
/**
 * Created by PhpStorm.
 * User: Hijarian
 * Date: 12.07.14
 * Time: 21:24
 */

namespace app\utilities;

use Symfony\Component\Yaml\Yaml;
use yii\web\ResponseFormatterInterface;

class YamlResponseFormatter implements ResponseFormatterInterface
{
    const FORMAT = 'yaml';

    public function format($response)
    {
        $response->headers->set('Content-Type: application/yaml');
        $response->headers->set('Content-Disposition: inline');
        $response->content = Yaml::dump($response->data);
    }
}
