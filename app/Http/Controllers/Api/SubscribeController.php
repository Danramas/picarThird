<?php

namespace App\Http\Controllers\Api;

use App\Advert;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribeController extends Controller
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function subscribe(Request $request)
    {
            $user = User::find($request->user_id);
            $advert = Advert::find($request->advert_id);

            if ($advert) {
                if ($this->checkSubscribeStatus($request) == 'false') {
                    $user->subscriptions()->attach($advert->id);
                    return [
                        'subscribe successful' => 200,
                    ];
                } else {
                    $user->subscriptions()->detach($advert->id);
                    return [
                        'unsubscribe successful' => 200,
                    ];
                }
            }

            return [
                'advert ID not found' => 404,
            ];
    }


    /**
     * @param Request $request
     *
     * @return boolean
     */
    public function checkSubscribeStatus(Request $request)
    {
        if ($request->user_id) {
            $user = User::find($request->user_id);

            $current = $user
                ->subscriptions()
                ->whereId($request->advert_id)
                ->first();

            if ($current) {
                if ($request->advert_id == $current->pivot->advert_id
                    && $request->user_id == $current->pivot->user_id) {
                    return 'true';
                }
            }
        }

        return 'false';
    }
}
