<?php

namespace App\Services;

use App\Contracts\IModificationService;
use App\Modification;
use Illuminate\Database\Eloquent\Builder;

class ModificationService implements IModificationService
{
    public function getModificationsBySample(
        ?int $sample = null
    )
    {
        return Modification::with('sample')
            ->when($sample, function (Builder $subQuery) use ($sample) {
                return $subQuery->where('sample_id', $sample);
            })
            ->orderBy('modificationName', 'asc')
            ->get();
    }
}
