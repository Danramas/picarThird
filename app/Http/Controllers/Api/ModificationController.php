<?php

namespace App\Http\Controllers\Api;

use App\Contracts\IModificationService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ModificationController extends Controller
{
    protected $modificationService;

    public function __construct(
        IModificationService $modificationService
    ) {
        $this->modificationService = $modificationService;
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
        $modifications = $this->modificationService->getModificationsBySample($request->sample_id);

        return $modifications;
    }

}
