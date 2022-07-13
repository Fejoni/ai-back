<?php

namespace App\Http\Controllers\Site\Aside;

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
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="title", type="string", example="title"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      )
     * )
     */

    public function get()
    {
        return ThemeResource::collection(Theme::with('subjects')->get());
    }
}
