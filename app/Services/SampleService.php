<?php

namespace App\Services;

use App\Contracts\ISampleService;
use App\Sample;
use Illuminate\Database\Eloquent\Builder;

class SampleService implements ISampleService
{
    public function getSamplesByMark(
        ?int $mark = null
    )
    {
        return Sample::with('mark')
            ->when($mark, function (Builder $subQuery) use ($mark) {
                return $subQuery->where('mark_id', $mark);
            })
            ->orderBy('sampleName', 'asc')
            ->get();
    }
}
