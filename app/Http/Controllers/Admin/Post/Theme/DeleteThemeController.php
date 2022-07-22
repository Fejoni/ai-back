<?php

namespace App\Http\Controllers\Admin\Post\Theme;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\Theme\DeleteThemeRequest;
use App\Models\Admin\Post\Theme;

class DeleteThemeController extends Controller
{
    /**
     * Delete Theme
     * @OA\Post (
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

        return response()->json('success');
    }
}
