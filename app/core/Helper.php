<?php

class Helper {
    function showError($errors)
    {
        foreach ($errors as $key => $value)
        {
            echo "<b>" . $key . "</b>" . " = " . $value . "<br>";
        }
    }
}