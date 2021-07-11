<?php

namespace App;

use App\Interceptor\BeforeActionInterceptor;
use App\Interceptor\Interceptor;
use App\Interceptor\NeedLoginInterceptor;
use App\Interceptor\NeedLogoutInterceptor;

class Application
{
    public static function getInstance(): Application
    {
        static $instance;

        if ($instance === null) {
            $instance = new Application();
        }

        return $instance;
    }

    private function __construct()
    {

    }

    function getEnvCode(): string
    {
        if ($_SERVER['DOCUMENT_ROOT'] == '/web/site5/public') {
            return 'prod';
        }

        return "dev";
    }

    function getProdSiteDomain()
    {
        return "mekemeke.shop";
    }

    public function getDbConnectionByEnv(): \mysqli
    {
        $envCode = $this->getEnvCode();

        if ($envCode == 'dev') {
            $dbHost = "127.0.0.1";
            $dbId = "sbsst";
            $dbPw = "sbs123414";
            $dbName = "site5";
        } else {
            $dbHost = "127.0.0.1";
            $dbId = "siteLocal5";
            $dbPw = "sbslocal123414";
            $dbName = "site5";
        }

        $dbConn = mysqli_connect($dbHost, $dbId, $dbPw, $dbName) or die("DB CONNECTION ERROR");

        return $dbConn;
    }

    public function runByRequestUri(string $requestUri)
    {
        if ($requestUri == '/') {
            jsLocationReplaceExit("/usr/article/list");
        }

        list($action) = explode('?', $requestUri);
        $action = substr($action, 1);

        $this->run($action);
    }

    private function runAction(string $action)
    {
        list($controllerTypeCode, $controllerName, $actionFuncName) = explode('/', $action);

        $controllerClassName = "App\\Controller\\" . ucfirst($controllerTypeCode) . ucfirst($controllerName) . "Controller";
        $actionMethodName = "action";

        if (str_starts_with($actionFuncName, "do")) {
            $actionMethodName .= ucfirst($actionFuncName);
        } else {
            $actionMethodName .= "Show" . ucfirst($actionFuncName);
        }

        $usrArticleController = new $controllerClassName();
        $usrArticleController->$actionMethodName();
    }

    private function run(string $action)
    {
        $this->runInterceptors($action);
        $this->runAction($action);
    }

    private function runInterceptors(string $action)
    {
        $run = function (Interceptor...$interceptors) use ($action) {
            foreach ($interceptors as $interceptor) {
                $interceptor->run($action);
            }
        };

        $run(new BeforeActionInterceptor(), new NeedLoginInterceptor(), new NeedLogoutInterceptor());
    }
}
