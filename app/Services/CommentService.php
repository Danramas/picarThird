<?php

namespace App\Services;

use App\Contracts\ICommentService;
use App\Comment;
use Illuminate\Database\Eloquent\Builder;

class CommentService implements ICommentService
{
    public function getAllComments(int $advert_id)
    {
        return Comment::with('user')
            ->when($advert_id, function (Builder $subQuery) use ($advert_id) {
                return $subQuery->where('advert_id', $advert_id);
            })
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function addNewComment(
        string $text,
        int $advert_id,
        int $user_id
    )
    {
        $comment = new Comment(
            [
               'text' => $text,
                'advert_id' => $advert_id,
                'user_id' => $user_id
            ]
        );
        $comment->save();
    }
}
