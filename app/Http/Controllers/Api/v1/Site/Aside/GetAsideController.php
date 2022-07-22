<?php

namespace App\Http\Controllers\Api\v1\Site\Aside;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Post\ThemeResource;
use App\Models\Admin\Post\Theme;

class GetAsideController extends Controller
{
    /**
     * Get Aside
     * @OA\Get (
     *     path="/api/forum/aside/get",
     *     tags={"Aside"},
     *     description="Возвращает ответ с темами и тематиками Aside (Боковая меню слево)",
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number"),
     *              @OA\Property(property="title", type="string"),
     *              @OA\Property(property="subject", type="string"),
     *              example={
     *                     "id":"1",
     *                     "title":"Фреймворки",
     *                     "subjects":{
     *                      "id":"7",
     *                      "title":"Laravel",
     *                      },
     *                }
     *          )
     *      )
     * )
     */

    public function get()
    {
        return ThemeResource::collection(Theme::with('subjects')->get());
    }
}
