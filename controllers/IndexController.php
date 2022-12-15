<?php

namespace app\controllers;

use app\engine\Session;
use app\engine\Request;
use app\models\repositories\UserRepository;
use app\models\repositories\CurrencyRepository;
use app\models\repositories\CurrenciesRepository;
use app\models\entities\Currency;
use app\models\entities\Currencies;

class IndexController extends Controller {

    public function actionIndex() {
        $auth_token = (new Session())->get('auth_token');
        $user = (new UserRepository())->isAuth($auth_token); // Валидация пользователя, Метод isAuth находится в models\repositories\UserRepository.php

        if ($user) {
            $currency = (new CurrencyRepository())->getAll(); // Метод getAll находится в models\Repository.php
            echo $this->render('index', [
                'currency' => $currency
            ]);
        } else {
            header('Location: /auth');
            die();
        }
    }

    public function actionDynamic() { // Метод для вывода котировок за определенный период
        $valuteID = (new Request())->getParams()['valuteID']; // Получаем идентификатор валюты
        $valuteID = 'R01235'; // Переназначаем идентификатор валюты на usd так как в бд есть данные только по ней 

        $date['date_from'] = (new Request())->getParams()['date-from']; // Получаем даты с формы
        $date['date_to'] = (new Request())->getParams()['date-to'];

        $date_from = date('Y-m-d', strtotime($date['date_from']));
        $date_to = date('Y-m-d', strtotime($date['date_to']));

        $currencies = (new CurrenciesRepository())->getlimit($valuteID, $date_from, $date_to); // Метод getlimit находится в models\Repository.php

        echo $this->render('dynamic', [
            'currencies' => $currencies
        ]);

        // Код для парсинга и записи в бд 
        /*
        $date_from = date('d/m/Y', strtotime($date['date_from']));
        $date_to = date('d/m/Y', strtotime($date['date_to']));
        $xml_file = simplexml_load_file("http://www.cbr.ru/scripts/XML_dynamic.asp?date_req1={$date_from}&date_req2={$date_to}&VAL_NM_RQ={$valuteID}");

        foreach ($xml_file as $item) {
            $valuteID = strval($item->attributes()->Id);
            $value = strval($item->Value);
            $date = date('Y-m-d', strtotime(strval($item->attributes()->Date)));
            $currencies = new Currencies($valuteID, $value, $date);
            (new CurrenciesRepository())->save($currencies);
        } 
        */
    }

    public function actionUpdate() { // Метод для обновления котировок в таблице сurrency
        $today = date("d/m/Y");

        $xml_file = simplexml_load_file("http://www.cbr.ru/scripts/XML_daily.asp?date_req={$today}");

        $currency = (new CurrencyRepository())->getAll(); // Метод getAll находится в models\Repository.php

        foreach ($currency as $item) {
            foreach ($xml_file as $xml) {
                if (strval($xml->attributes()->ID) == $item['valuteID']) {
                    $collector['value_id'] = strval($xml->attributes()->ID);
                    $collector['num_code'] = strval($xml->NumCode);
                    $collector['char_code'] = strval($xml->CharCode);
                    $collector['name'] = strval($xml->Name);
                    $collector['value'] = strval($xml->Value);
                    $collector['date'] =   date('Y-m-d', strtotime((strval($xml_file->attributes()->Date))));
                    $collector['id'] = $item['id'];
                    $data[] = $collector;
                }
            }
        }

        foreach ($data as $item) {
            $entitys = new Currency($item['value_id'], $item['num_code'], $item['char_code'], $item['name'], $item['value'], $item['date']);
            $entitys->id = $item['id']; // Устанавливаем id для update. Если id нет, то будет выполнен insert в методе save - models\Repository.php
            (new CurrencyRepository())->save($entitys); // Метод save находится в models\Repository.php
        } 

        // Код для парсинга и записи в бд всех котировок на сегодняшний день
        /*  
        foreach ($xml_file as $item) {
            $valuteID = strval($item->attributes()->ID);
            $numCode = strval($item->NumCode);
            $charCode = strval($item->CharCode);
            $name = strval($item->Name);
            $value = strval($item->Value);
            $date = date('Y-m-d', strtotime((strval($xml_file->attributes()->Date))));

            $currency = new Currency($valuteID, $numCode, $charCode, $name, $value, $date); //cоздаем cущноcть c данными
            (new CurrencyRepository())->save($currency); // Метод save находится в models\Repository.php 
        }  
        */
    }
}
