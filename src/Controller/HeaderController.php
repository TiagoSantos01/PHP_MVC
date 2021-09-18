<?php

namespace src\Controller;

class HeaderController
{
    function __construct()
    {
        $this->Views = new ViewsController();
    }
    
    public function Header(): void
    {
        $this->Views->page("Nav/Header");
        $this->Views->page("Nav/Meta");
        $this->Views->page("Nav/Title");

    }

}