<?php

namespace app\models;

use app\engine\Db;

abstract class Repository {

    abstract protected function getTableName();
    abstract protected function getEntityClass();

    public function insert(Entity $entity) { // Метод, который собирает данные и подготавливает запрос для выполнения INSERT
        $params = [];
        $columns = [];

        foreach ($entity->props as $key => $value) {
            $params[":{$key}"] = $entity->$key;
            $columns[] = $key;
        }

        $columns = implode(', ', $columns);
        $value = implode(', ', array_keys($params));

        $tableName = $this->getTableName(); // Имя таблицы берем из models\repositories\

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$value})";

        DB::getInstance()->execute($sql, $params); // Метод execute находится в engine\Db.php

        $entity->id = DB::getInstance()->lastInsertId();

        return $this;
    }

    public function update(Entity $entity) { // Метод, который собирает данные и подготавливает запрос для выполнения UPDATE
        $params = []; 
        $columns = [];

        foreach ($entity->props as $key => $value) {
            $params["{$key}"] = $entity->$key;
            $columns[] .= "`{$key}` = :{$key}";
            $entity->props[$key] = false;
        }

        $columns = implode(", ", $columns);

        $tableName = $this->getTableName(); // Имя таблицы берем из models\repositories\

        $params['id'] = $entity->id;

        $sql = "UPDATE `{$tableName}` SET {$columns} WHERE `id` = :id";

        Db::getInstance()->execute($sql, $params); // Метод execute находится в engine\Db.php

        return $this;
    }

    public function save(Entity $entity) {
        if (is_null($entity->id)) { // Если, в сущности, не установили id, то выполняем insert, иначе update
            return $this->insert($entity);
        } else {
            return $this->update($entity);
        }
    }

    public function getOneWhere($name, $value) { // Метод для извлечения данных по условию WHERE
        $tableName = $this->getTableName(); // Имя таблицы берем из models\repositories\
        $sql = "SELECT * FROM {$tableName} WHERE `{$name}`=:value"; 
        return Db::getInstance()->queryOneObject($sql, ['value' => $value], $this->getEntityClass()); // Метод queryOneObject находится В engine\Db.php
    }

    public function getAll() { // Метод для извлечения всех данных
        $tableName = $this->getTableName(); // Имя таблицы берем из models\repositories\
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql); // Метод queryAll находится В engine\Db.php
    }

    public function getLimit($valuteID, $date_from, $date_to) { // Метод для извлечения валюты по дате
        $tableName = $this->getTableName(); // Имя таблицы берем из models\repositories\
        $sql = "SELECT * FROM {$tableName} WHERE valuteID = :valuteID AND date_update BETWEEN :date_from AND :date_to";
        return Db::getInstance()->queryAll($sql, ['valuteID' => $valuteID, 'date_from' => $date_from, 'date_to' => $date_to]); // Метод queryAll находится В engine\Db.php
    } 
}
