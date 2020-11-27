<?php

namespace App\Http\Controllers\Api;

use App\Contracts\ISampleService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    protected $sampleService;

    public function __construct(
        ISampleService $sampleService
    ) {
        $this->sampleService = $sampleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return Collection
     */
    public function index(Request $request): Collection
    {
        $samples = $this->sampleService->getSamplesByMark($request->mark_id);

        return $samples;
    }
}
