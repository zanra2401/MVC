<?php

class Zanra extends Controller 
{
    function index()
    {
        $this->view("zanra", 
            [
                "title" => "Zanra MVC",
                "pesan" => "MVC"
            ]
        );
    }
}