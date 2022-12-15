<?php

namespace app\models\repositories;

use app\models\entities\Currencies;
use app\models\Repository;

class CurrenciesRepository extends Repository {

    protected function getEntityClass() {
        return Currencies::class;
    }

    protected function getTableName() {
        return 'currencies'; // Имя таблицы в бд
    }
}
