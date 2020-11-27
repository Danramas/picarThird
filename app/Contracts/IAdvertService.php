<?php

namespace App\Contracts;

interface IAdvertService
{
    public function getAllAdverts(int $mark_id, int $sample_id, int $modification_id, int $minYear, int $maxYear, bool $withImagesOnly);

    public function getCurrentAdvert(int $advert_id);
}
