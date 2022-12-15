<?php

namespace app\models\entities;

use app\models\Entity;

class Currency extends Entity {

    protected $id;
    protected $valuteID;
    protected $numCode;
    protected $charCode;
    protected $name;
    protected $value;
    protected $date;

    protected $props = [
        'valuteID' => false,
        'numCode' => false,
        'charCode' => false,
        'name' => false,
        'value' => false,
        'date_update' => false,

    ];

    public function __construct($valuteID = null, $numCode = null, $charCode = null, $name = null, $value = null, $date = null) {
        $this->valuteID = $valuteID;
        $this->numCode = $numCode;
        $this->charCode = $charCode;
        $this->name = $name;
        $this->value = $value;
        $this->date_update = $date;
    }
}
