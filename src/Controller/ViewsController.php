<?php

namespace src\Controller;

class ViewsController
{
    function page($page,$Objects=array()){
        foreach($Objects as $key =>$Object){
            eval("\$" . $key . "=\"".$Object."\";");
        }
        include  getcwd()."/src/Views/".$page.".html";
    }
 }