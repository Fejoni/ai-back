<?php

namespace App\Http\Controllers\Api\v1\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\Theme\CreateThemeRequest;
use App\Http\Requests\Admin\Post\Theme\DeleteThemeRequest;
use App\Http\Requests\Admin\Post\Theme\UpdateThemeRequest;
use App\Services\Admin\Theme\ThemeService;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    private ThemeService $themeService;

    public function __construct(ThemeService $themeService)
    {
        $this->themeService = $themeService;
    }

    /**
     * Создает тему | Контроллер <br>
     * Используется для боковой панели
     *
     * @param CreateThemeRequest $request
     * @return void
     */
    public function create(CreateThemeRequest $request)
    {
        $this->themeService->create($request->validated());
    }

    /**
     * Обновляет тему | Контроллер <br>
     * Используется для боковой панели
     *
     * @param UpdateThemeRequest $request
     * @return void
     */
    public function update(UpdateThemeRequest $request)
    {
        $this->themeService->update($request->validated());
    }

    /**
     * Удаляет тему | Контроллер <br>
     * Используется для боковой панели
     *
     * @param DeleteThemeRequest $request
     * @return void
     */
    public function delete(DeleteThemeRequest $request)
    {
        $this->themeService->delete($request->validated());
    }
}
