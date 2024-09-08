<?php

session_set_cookie_params([
    "lifetime" => 2,
    "secure" => true,
    "httponly" => true
]);

session_start();

define("ROOT_APP", __DIR__ . "/../");
define("VIEW", __DIR__ . "/../views/");
