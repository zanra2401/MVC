<?php

Class Controller {
    function view($view, $data = [])
    {
        require_once VIEW . $view . ".php";
    }
}