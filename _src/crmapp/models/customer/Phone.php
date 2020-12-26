<?php
/**
 * Created by PhpStorm.
 * User: Hijarian
 * Date: 04.07.14
 * Time: 11:33
 */

namespace app\models\customer;


class Phone {
    /** @var string */
    public $number;

    public function __construct($number)
    {
        $this->number = $number;
    }
}