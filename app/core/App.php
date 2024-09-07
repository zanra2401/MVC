<?php

require_once ROOT_APP . "core/Helper.php";
require_once ROOT_APP . "core/Database.php";


class App {
    private $database;
    private $controller;
    private $method;
    private $url;
    function __construct() 
    {
        $this->database = new Database();
        $this->parseUrl();
    }

    function parseUrl() 
    {
        if (isset($_GET["url"]))
        {
            $this->url = rtrim($_GET["url"], "/");
            $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
            $this->url = explode("/", $this->url);
            $this->controller = array_shift($this->url);
            $this->method = array_shift($this->url);
            $this->param = $this->url;
            if (file_exists(ROOT_APP . "controllers/" . $this->controller . ".php")) 
            {
                require_once ROOT_APP . "controllers/" . $this->controller . ".php";
                if (isset($this->controller))
                {
                    $this->controller = new $this->controller;
                    if (isset($this->method) && method_exists($controller, $this->method))
                    {
                        call_user_func_array([$this->controller, $this->method], [$this->param]);
                    }
                    else 
                    {
                        $this->controller->index();
                    }
                }
            }
            else
            {
                // JIKA CONTROLLER TIDAK DI TEMUKAN
                echo "404 NOT FOUND";
            }
        }
        else 
        {
            require_once ROOT_APP . "controllers/Zanra.php";
            $this->controller = new Zanra();
            $this->controller->index();
        }
        
    }

}