<?php

namespace App\Http\Controllers\Admin\Post\Theme;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\Theme\CreateThemeRequest;
use App\Models\Admin\Post\Theme;
use function response;

class CreateThemeController extends Controller
{
    /**
     * Create Theme
     * @OA\Post (
     *     path="/api/admin/create/theme",
     *     tags={"Theme"},
     *     description="Создает тему для боковой панели навигации",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="title",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "title":"Языки программирования"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="title", type="string", example="title"),
     *          )
     *      ),
     * )
     */

    public function create(CreateThemeRequest $request)
    {
        $validatedData = $request->validated();

        Theme::create([
           'title' => $request->input('title')
        ]);

        return response()->json('success');
    }
}
