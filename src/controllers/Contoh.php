<?php

require_once "Controller.php";

class Contoh extends Controller
{
  function halo($parameters = [])
  {
    $this->view('contoh', [
      'title' => "data"
    ]);
  }
}
