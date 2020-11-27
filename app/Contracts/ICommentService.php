<?php

namespace App\Contracts;

interface ICommentService
{
    public function getAllComments(int $advert_id);

    public function addNewComment(string $text, int $advert_id, int $user_id);
}
