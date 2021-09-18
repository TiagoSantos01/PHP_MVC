<?php

namespace src\Controller;

class EnvController
{
    function __construct()
    {
        $file= getcwd()."/.env";

        $contents = fopen($file,"r");
        $conteudo = fread($contents,filesize($file));
        
        fclose($contents);

        $env = explode("\n",$conteudo);
        
        foreach($env as $id => $key)
        {
            $content = explode("=", $key);

            $this->{$content[0]} = $content[1];
        }

    }
    public function  Get(string $Variable): string{
        return $this->{$Variable};
    }
}

