<?php

require_once ROOT_APP . "core/Helper.php";
require_once ROOT_APP . "core/Database.php";
require_once ROOT_APP . "controllers/ErrorController.php";


$errorController = new ErrorController();


class App {
    private $defaultController;
    private $defaultMethod;
    private $controller;
    private $database;
    private $method;
    private $param = [];
    private $url;


    function __construct() 
    {
        // $this->database = new Database();s
        $this->defaultMethod = "index";
        $this->defaultController = "Zanra";
        $this->getUrl();
    }

    private function execUrl() 
    {
        if (isset($this->method))
        {
            call_user_func_array([$this->controller, $this->method], array($this->param));
        }
        else 
        {
            call_user_func_array([$this->controller, $this->defaultMethod], array($this->param));
        }    
    }

    private function parseUrl()
    {
            $this->controller = ucfirst(array_shift($this->url));
            // CEK file controller ada atau tidak
            if (!file_exists(ROOT_APP . "controllers/" . $this->controller . ".php"))
            {
                $errorController->pageNotFound();
                return;
            }
            require_once ROOT_APP . "controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;
            if (isset($this->url[0]) && method_exists($this->controller, $this->url[0]))
            {
                $this->method = array_shift($this->url);
            }
            $this->param = $this->url;
            $this->execUrl();
       
    }

    private function getUrl()
    {
        if (isset($_GET["url"]))
        {
            $this->url = htmlspecialchars($_GET["url"], ENT_QUOTES, "UTF-8");
            $this->url = rtrim($this->url, "/");
            $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
            $this->url = explode("/", $this->url);
            $this->parseUrl();
        }
        else
        {
            $this->defaultPage();
        }
    }

    private function defaultPage()
    {
        // Halaman Default
        require_once ROOT_APP . "controllers/" . $this->defaultController . ".php";
        $this->controller = new $this->defaultController;
        call_user_func([$this->controller, $this->defaultMethod]);
    }
}