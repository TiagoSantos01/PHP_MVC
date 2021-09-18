<?php

namespace src\Controller;

class ErrorController
{
    function __construct()
    {
        $this->Views = new ViewsController();
        $this->Header = new HeaderController();
        $this->Footer = new FooterController();
    }

    public function Error404(): void
    {
        $this->Header->Header();
        $this->Views->Page("Error/404");
        $this->Footer->Footer();

    }
}