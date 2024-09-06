<?php

class Test extends Controller {
    function index()
    {
        echo "test";
    }

    function Home($params = [])
    {
        $this->view("test", $params);       
        
    }
}