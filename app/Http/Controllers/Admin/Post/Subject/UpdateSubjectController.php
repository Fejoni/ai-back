<?php

namespace App\Http\Controllers\Admin\Post\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\Subject\UpdateSubjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateSubjectController extends Controller
{
    /**
     * Update Subject
     * @OA\Post (
     *     path="/api/admin/update/subject",
     *     tags={"Subject"},
     *     description="Обновляет тематику для боковой панели навигации",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="title",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="titleUpdate",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="theme_id",
     *                          type="int",
     *                      ),
     *                      @OA\Property(
     *                          property="theme_idUpdate",
     *                          type="int"
     *                      )
     *                 ),
     *                 example={
     *                     "title":"Laravel",
     *                     "titleUpdate":"Vue",
     *                     "theme_id":"1",
     *                     "theme_idUpdate":"3"
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

    public function update(UpdateSubjectRequest $request)
    {
        $validatedData = $request->validated();

        DB::table('subjects')->where('title', '=', $request->input('title'))->update(
            [
                'title' => $request->input('titleUpdate'),
                'theme_id' => $request->input('theme_idUpdate')
            ]);

        return response()->json('success');
    }
}
