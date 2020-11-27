<?php

namespace App\Http\Controllers\Api;

use App\Contracts\ICommentService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(
        ICommentService $commentService
    ) {
        $this->commentService = $commentService;
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
       $comments = $this->commentService->getAllComments($request->advert_id);

       return $comments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return void
     */
    public function create(Request $request)
    {
        if ($request->text) {
            $this->commentService->addNewComment(
                $request->text,
                $request->advert_id,
                $request->user_id
            );
        }
    }
}
