<?php

namespace App\Services;

use App\Contracts\IAdvertService;
use App\Advert;
use Illuminate\Database\Eloquent\Builder;

class AdvertService implements IAdvertService
{
    public function getAllAdverts(
        ?int $mark = null,
        ?int $sample = null,
        ?int $modification = null,
        ?int $minYear = null,
        ?int $maxYear = null,
        ?bool $withImagesOnly = false
    )
    {
        return Advert::with([
            'modification',
            'modification.sample',
            'modification.sample.mark',
            'user',
            'user.subscriptions'
        ])
            ->when($withImagesOnly == 'true', function (Builder $subQuery) {
                return $subQuery->where('image1', '!=', null);
            })
            ->when($modification, function (Builder $subQuery) use ($modification) {
                return $subQuery->where('modification_id', $modification);
            })
            ->when($sample, function (Builder $subQuery) use ($sample) {
                return $subQuery->whereHas('modification', function (Builder $subQuery) use ($sample) {
                    return $subQuery->where('sample_id', $sample);
                });
            })
            ->when($mark, function (Builder $subQuery) use ($mark) {
                return $subQuery->whereHas('modification.sample', function (Builder $subQuery) use ($mark) {
                    return $subQuery->where('mark_id', $mark);
                });
            })
            ->whereBetween('year', [$minYear, $maxYear])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getCurrentAdvert(int $advert)
    {
        return Advert::with([
            'modification',
            'modification.sample',
            'modification.sample.mark',
            'user',
            'user.subscriptions'
        ])
            ->where('id', $advert)
            ->get();
    }
}
