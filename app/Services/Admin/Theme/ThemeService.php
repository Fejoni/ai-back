<?php

namespace App\Services\Admin\Theme;

use App\Models\Admin\Post\Theme;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ThemeService
{
    /**
     * Создает тему | Сервис <br>
     * Используется для боковой панели
     *
     * @param $data
     * @return Response|Application|ResponseFactory
     */
    public function create($data): Response|Application|ResponseFactory
    {
        Theme::create([
            'title' => $data['title']
        ]);

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }

    /**
     * Обновляет тему | Сервис <br>
     * Используется для боковой панели
     *
     * @param $data
     * @return Response|Application|ResponseFactory
     */
    public function update($data): Response|Application|ResponseFactory
    {
        Theme::where('title', $data['title'])->update([
           'title' => $data['titleUpdate'] ?? null,
        ]);

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }

    /**
     * Удаляет тему | Сервис <br>
     * Используется для боковой панели
     *
     * @param $data
     * @return Response|Application|ResponseFactory
     */
    public function delete($data): Response|Application|ResponseFactory
    {
        Theme::where('title', $data['title'])->delete();

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}