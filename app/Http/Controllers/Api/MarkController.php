<?php

namespace App\Http\Controllers\Api;

use App\Contracts\IMarkService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class MarkController extends Controller
{
    protected $markService;

    public function __construct(
        IMarkService $markService
    ) {
        $this->markService = $markService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->markService->getAllMarks();
    }
}
