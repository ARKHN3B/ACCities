<?php

// Autoloader for loading classes

function loadMyClass($class)
{
    if (!class_exists($class)) {
        $path_1 = 'Models/Classes/' . $class . '.php';
        $path_2 = 'Services/' . $class . '.php';
        $path_3 = 'Models/Classes/DBTables/' . $class . '.php';
        $path_4 = 'Models/Repositories/' . $class . '.php';

        if (file_exists($path_1))
            require $path_1;
        elseif (file_exists($path_2))
            require $path_2;
        elseif (file_exists($path_3))
            require $path_3;
        elseif (file_exists($path_4))
            require $path_4;
    }
}

spl_autoload_register('loadMyClass');