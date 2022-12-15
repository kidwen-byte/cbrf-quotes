<?php
session_start();

use app\engine\Autoload;
use app\engine\Request;
use app\engine\Render;

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

try {
    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'index'; // Первый параметр в адресной строке - контроллер
    $actionName = $request->getActionName(); // Второй параметр в адресной строке - метод в контроллере

    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new Render());
        $controller->runAction($actionName);
    } else {
        die("404");
    }
} catch (\PDOException $e) {
    var_dump($e->getMessage());
} catch (\Exception $e) {
    var_dump($e);
}
