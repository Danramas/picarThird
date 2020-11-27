<?php

namespace App\Http\Controllers\Api\V1\Transformers;

use App\Advert;
use Illuminate\Contracts\Support\Arrayable;
use Saritasa\Transformers\BaseTransformer;
use Saritasa\Transformers\Exceptions\TransformTypeMismatchException;
use Saritasa\Transformers\IDataTransformer;

class AdvertTransformer extends BaseTransformer implements IDataTransformer
{
    public function transform(Arrayable $model): array
    {
        if (!$model instanceof Advert) {
            throw new TransformTypeMismatchException($this, Advert::class, get_class($model));
        }
        return $this->transformAdvert($model);
    }

    public function transformAdvert(Advert $advert): array
    {
        $mark = $advert->modification->sample->mark;
        $sample = $advert->modification->sample;
        $modification = $advert->modification;
        $user = $advert->user;

        return [
          'id' => $advert->id,
          'markName' => $mark->markName,
          'sampleName' => $sample->sampleName,
          'modificationName' => $modification->modificationName,
          'year' => $advert->year,
          'createdAt' => $advert->created_at,
          'createdBy' => $user->name,
          'image1' => $advert->image1,
          'image2' => $advert->image2,
          'image3' => $advert->image3,
          'image4' => $advert->image4,
          'image5' => $advert->image5,
        ];
    }
}
