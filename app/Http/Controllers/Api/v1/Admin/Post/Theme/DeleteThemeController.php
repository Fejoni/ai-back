<?php

namespace App\Http\Controllers\Api\v1\Admin\Post\Theme;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\Theme\DeleteThemeRequest;
use App\Models\Admin\Post\Theme;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use function response;

class DeleteThemeController extends Controller
{
    /**
     * Delete Theme
     * @OA\Delete (
     *     path="/api/admin/delete/theme",
     *     tags={"Theme"},
     *     description="Удаляет тему для боковой панели навигации",
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
     *      ),
     * )
     */
    public function delete(DeleteThemeRequest $request)
    {
        $validatedData = $request->validated();

        Theme::where('title', $request->input('title'))->delete();

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
