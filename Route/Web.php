<?php
class Route{
    function loadPage($db, $controllerName, $actionName = 'index') {
        include_once 'app/Controllers/ControllerIndex.php';
        include_once 'app/Controllers/ControllerUsers.php';

        switch ($controllerName) {
            case 'users':
                $controller = new ControllerUsers($db);
                break;
            default:
                $controller = new ControllerIndex($db);
        }
        $controller->$actionName();
    }
}