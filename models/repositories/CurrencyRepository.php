<?php

namespace app\models\repositories;

use app\models\entities\Currency;
use app\models\Repository;

class CurrencyRepository extends Repository {

    protected function getEntityClass() {
        return Currency::class;
    }

    protected function getTableName() {
        return 'currency'; // Имя таблицы в бд
    }
}
