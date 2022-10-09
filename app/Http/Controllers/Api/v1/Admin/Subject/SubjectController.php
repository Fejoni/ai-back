<?php

namespace App\Http\Controllers\Api\v1\Admin\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\Subject\CreateSubjectRequest;
use App\Http\Requests\Admin\Post\Subject\DeleteSubjectRequest;
use App\Http\Requests\Admin\Post\Subject\UpdateSubjectRequest;
use App\Services\Admin\Subject\SubjectService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubjectController extends Controller
{
    private SubjectService $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }

    /**
     * Создает тематику | Контроллер
     *
     * @param CreateSubjectRequest $request
     * @return Response|Application|ResponseFactory
     */
    public function create(CreateSubjectRequest $request): Response|Application|ResponseFactory
    {
        return $this->subjectService->create($request->validated());
    }

    /**
     * Обновляет тематику | Контроллер
     *
     * @param UpdateSubjectRequest $request
     * @return Response|Application|ResponseFactory
     */
    public function update(UpdateSubjectRequest $request): Response|Application|ResponseFactory
    {
        return $this->subjectService->update($request->validated());
    }

    /**
     * Удаляет тематику | Контроллер
     *
     * @param DeleteSubjectRequest $request
     * @return Response|Application|ResponseFactory
     */
    public function delete(DeleteSubjectRequest $request): Response|Application|ResponseFactory
    {
        return $this->subjectService->delete($request->validated());
    }
}
