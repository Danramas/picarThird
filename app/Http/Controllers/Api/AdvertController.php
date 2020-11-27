<?php

namespace App\Http\Controllers\Api;

use App\Advert;
use App\Contracts\IAdvertService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AdvertController extends Controller
{
    protected $advertService;

    public function __construct(
        IAdvertService $advertService
    )
    {
        $this->advertService = $advertService;
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
        $withImagesOnly = $request->withImagesOnly == 'true'? true : false;
        $adverts = $this->advertService->getAllAdverts(
            $request->mark_id,
            $request->sample_id,
            $request->modification_id,
            $request->minYear,
            $request->maxYear,
            $withImagesOnly
        );

        return $adverts;
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Advert
     */
    public function show(Request $request): Advert
    {
        $adverts = $this->advertService->getCurrentAdvert($request->advert_id);

        return $adverts->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        try {
            $this->validate($request, [
                'id' => '',
                'modification_id' => 'required|max:225',
                'user_id' => 'required|max:225',
                'year' => '',
                'images' => '',
            ]);
        } catch (ValidationException $e) {

        }
        $advert = new Advert($request->all());
        foreach ($request->get('images') as $i => $hash) {
            $advert->{'image' . ($i + 1)} = $hash;
        }
        $advert->save();

        return response()->json([
            'success' => true,
            'advert_id' => $advert->id,
        ]);
    }
}
