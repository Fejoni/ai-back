<?php

namespace App\Http\Controllers\Api\v1\Admin\Post\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\Subject\UpdateSubjectRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use function response;

class UpdateSubjectController extends Controller
{
    /**
     * Update Subject
     * @OA\PUT (
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

    public function update(UpdateSubjectRequest $request): Response|Application|ResponseFactory
    {
        $validatedData = $request->validated();

        DB::table('subjects')->where('title', '=', $request->input('title'))->update(
            [
                'title' => $request->input('titleUpdate'),
                'theme_id' => $request->input('tФheme_idUpdate')
            ]);

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
