<?php
/**
 * Created by PhpStorm.
 * User: Hijarian
 * Date: 04.07.14
 * Time: 11:28
 */

namespace app\models\customer;


class Customer {
    /** @var string */
    public $name;

    /** @var \DateTime */
    public $birth_date;

    /** @var string */
    public $notes = '';

    /** @var PhoneRecord[] */
    public $phones = [];

    public function __construct($name, $birth_date)
    {
        $this->name = $name;
        $this->birth_date = $birth_date;
    }

} 