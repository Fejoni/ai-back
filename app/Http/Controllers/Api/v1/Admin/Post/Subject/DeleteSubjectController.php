<?php

namespace App\Http\Controllers\Api\v1\Admin\Post\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\Subject\DeleteSubjectRequest;
use App\Models\Admin\Post\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use function response;

class DeleteSubjectController extends Controller
{
    /**
     * Delete Subject
     * @OA\Delete (
     *     path="/api/admin/delete/subject",
     *     tags={"Subject"},
     *     description="Удаляет тематику для боковой панели навигации",
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
     *                     "title":"Laravel"
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

    public function delete(DeleteSubjectRequest $request): Response|Application|ResponseFactory
    {
        $validatedData = $request->validated();

        Subject::where('title', $request->input('title'))->delete();

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
