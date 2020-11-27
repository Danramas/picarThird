<?php

namespace App\Contracts;


interface ISubscribeService
{
    public function toSubscribe(int $user_id, int $advert_id): void;

    public function checkSubscribe(int $user_id, int $advert_id): bool;
}
