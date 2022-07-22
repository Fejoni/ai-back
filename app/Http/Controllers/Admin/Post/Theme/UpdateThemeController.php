<?php

namespace App\Http\Controllers\Admin\Post\Theme;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\Theme\UpdateThemeRequest;
use Illuminate\Support\Facades\DB;

class UpdateThemeController extends Controller
{
    /**
     * Update Theme
     * @OA\Post (
     *     path="/api/admin/update/theme",
     *     tags={"Theme"},
     *     description="Обновляет тему для боковой панели навигации",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property( property="title", type="string"),
     *                      @OA\Property(property="titleUpdate", type="string")
     *                 ),
     *                 example={
     *                     "title":"Языки программирования",
     *                     "titleUpdate":"Laravel",
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



    public function update(UpdateThemeRequest $request) {
        $validatedData = $request->validated();

        DB::table('themes')->where('title', '=', $request->input('title'))->update(['title' => $request->input('titleUpdate')]);
    }
}
