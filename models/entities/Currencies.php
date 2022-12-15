<?php

namespace app\models\entities;

use app\models\Entity;

class Currencies extends Entity {

    protected $id;
    protected $valuteID;
    protected $value;
    protected $date;

    protected $props = [
        'valuteID' => false,
        'value' => false,
        'date_update' => false,
    ];

    public function __construct($valuteID = null, $value = null, $date = null) {
        $this->valuteID = $valuteID;
        $this->value = $value;
        $this->date_update = $date;
    }
}
