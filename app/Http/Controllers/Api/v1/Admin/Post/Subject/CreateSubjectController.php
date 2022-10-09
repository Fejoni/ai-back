<?php

namespace App\Http\Controllers\Api\v1\Admin\Post\Subject;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post\Subject;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use function response;

class CreateSubjectController extends Controller
{
    /**
     * Create Subject
     * @OA\Post (
     *     path="/api/admin/create/subject",
     *     tags={"Subject"},
     *     description="Создает тематику для боковой панели навигации",
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
     *                          property="theme_id",
     *                          type="int"
     *                      )
     *                 ),
     *                 example={
     *                     "title":"Laravel",
     *                     "theme_id":"1"
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
    public function create($data)
    {
        Subject::create([
            'title' => $data['title'],
            'theme_id' => $data['theme_id'],
        ]);

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
