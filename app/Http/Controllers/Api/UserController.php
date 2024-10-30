<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     *  Выводит всех пользователей
     *
     *  @return UserCollection
     */
    public function index(): UserCollection
    {
        $users = User::all();
        return new UserCollection($users);
    }

    /**
     *  Создает нового пользователя
     *
     *  @param StoreUserRequest $request
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        return ResponseController::successCreated('Пользователь успешно создан!', $user);
    }

    /**
     *  Выводит пользователя по id
     */
    public function show(string $id)
    {
        try {
            $user = User::where('id', $id)
                ->firstOrFail();

            return new UserResource($user);
        }
        catch (\Exception $e) {
            return ResponseController::notFound('Пользователь с таким ID не найден!');
        }
    }

    /**
     *  Обновляет данные пользователя по id
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        try {
            User::where('id', '=', $id)
                ->update($request->validated());

            return ResponseController::success('Пользователь успешно обновлен');
        }
        catch (\Exception $e) {
            return ResponseController::notFound('Пользователь не найден!');
        }
    }

    /**
     *  Удаляет пользователя по id
     */
    public function destroy(string $id)
    {
        if(User::destroy($id))
            return ResponseController::success('Пользователь успешно удален!');
        else
            return ResponseController::notFound('Пользователь не найден!');
    }
}
