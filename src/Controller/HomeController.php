<?php

namespace src\Controller;

class HomeController
{
    public function Index(): void
    {
        $this->Views->page("home");
    }
}
