<?php

namespace App\Services;

use App\Contracts\IMarkService;
use App\Mark;

class MarkService implements IMarkService
{
    public function getAllMarks()
    {
        return Mark::all();
    }
}
