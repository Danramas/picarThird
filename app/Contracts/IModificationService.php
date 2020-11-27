<?php

namespace App\Contracts;

interface IModificationService
{
    public function getModificationsBySample(int $sample_id);
}
