<?php

namespace App\Services\Admin\Subject;

use App\Models\Admin\Post\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SubjectService
{

    /**
     * Создает тематику | Сервис
     *
     * @param $data
     * @return Response|Application|ResponseFactory
     */
    public function create($data): Response|Application|ResponseFactory
    {
        Subject::create([
            'title' => $data['title'],
            'theme_id' => $data['theme_id'],
        ]);

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }

    /**
     * Обновляет тематику | Сервис
     *
     * @param $data
     * @return Response|Application|ResponseFactory
     */
    public function update($data): Response|Application|ResponseFactory
    {
        Subject::where('title', $data['title'])->update([
            'title' => $data['titleUpdate'] ?? null,
            'theme_id' => $data['theme_idUpdate'] ?? null,
        ]);

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }

    /**
     * Удаляет тематику | Сервис
     *
     * @param $data
     * @return Response|Application|ResponseFactory
     */
    public function delete($data): Response|Application|ResponseFactory
    {
        Subject::where('title', $data['title'])->delete();

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}