<?php

spl_autoload_register('AutoLoader');

function AutoLoader($className)
{
    $className = str_replace('\\',DIRECTORY_SEPARATOR,$className);

    if(file_exists('src/Controller/' . $className . '.php'))
    {
        require_once 'src/Controller/' . $className . '.php';
    } else if(file_exists('src/Views/' . $className . '.php'))
    {
        require_once 'src/Views/' . $className . '.php';
    } else if(file_exists('src/Model/' . $className . '.php'))
    {
        require_once 'src/Model/' . $className . '.php';
    } else {
        require_once  $className . '.php';

    }
}

    $Request=explode("/",$_SERVER['REQUEST_URI']);
    try{
        if(file_exists("src/Controller/".$Request[1]."Controller.php")){
            $Class ="src\\Controller\\" . $Request[1] . "Controller";

            $Controller = new $Class();
            $Controller->{ strlen($Request[2]) > 0 ? $Request[2] : "Index"}(array_splice($Request,3));
        }else if (strlen($Request[1]) == 0) {
            $Class = "src\\Controller\\HomeController";
            
            $Controller = new $Class();
            $Controller->{"Index"}();
        }else{
            throw "error";
        }
    }catch(Error $error){
        http_response_code(404);

        $Class = "src\\Controller\\ErrorController";

        $Controller = new $Class();
        $Controller->Error404();
    }
?>

