<?php

Class Controller {
    protected function view($view, $data = [])
    {
        require_once VIEW . $view . ".php";
    }
}