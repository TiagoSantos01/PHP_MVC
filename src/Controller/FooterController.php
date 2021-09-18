<?php

namespace src\Controller;

class FooterController
{
    function __construct()
    {
        $this->Views = new ViewsController();
    }
    
    public function Footer(): void
    {
        $this->Views->page("Nav/Footer");
    }

}