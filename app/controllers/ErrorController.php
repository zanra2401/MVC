<?php

class ErrorController extends Controller 
{
    function pageNotFound()
    {
        header("HTTP/1.1 404 NOT FOUND");
        $this->view("error/notFound");
        return;
    }
}