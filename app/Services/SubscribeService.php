<?php


namespace App\Services;


use App\Contracts\ISubscribeService;

class SubscribeService implements ISubscribeService
{
    public function toSubscribe(int $user_id, int $advert_id): void
    {
        // TODO: Implement toSubscribe() method.
    }

    public function checkSubscribe(int $user_id, int $advert_id): bool
    {
        // TODO: Implement checkSubscribe() method.
    }
}
