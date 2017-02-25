<?php

namespace App;

use Landish\Pagination\SemanticUI;

class Pagination extends SemanticUI
{

    public function __toString()
    {
        return $this->render();
    }
}