<?php

namespace App\Http\Controllers\Admin\Post\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\Subject\DeleteSubjectRequest;
use App\Models\Admin\Post\Subject;
use Illuminate\Http\Request;

class DeleteSubjectController extends Controller
{
    /**
     * Delete Subject
     * @OA\Post (
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

    public function delete(DeleteSubjectRequest $request)
    {
        $validatedData = $request->validated();

        Subject::where('title', $request->input('title'))->delete();

        return response()->json('success');
    }
}
