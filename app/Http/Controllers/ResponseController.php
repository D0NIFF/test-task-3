<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ResponseController extends Controller
{
    public static function success(string $message, mixed $data = []): JsonResponse
    {
        return new JsonResponse([
            'status' => 'success',
            'code' => Response::HTTP_OK,
            'message' => $message,
            'data' => $data
        ], Response::HTTP_OK);
    }

    public static function successCreated(string $message, mixed $data = []): JsonResponse
    {
        return new JsonResponse([
            'status' => 'success',
            'code' => Response::HTTP_CREATED,
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_CREATED);
    }

    public static function notFound(string $message): JsonResponse
    {
        return new JsonResponse([
            'status' => 'error',
            'code' => Response::HTTP_NOT_FOUND,
            'message' => $message,
        ], Response::HTTP_NOT_FOUND);
    }
}
