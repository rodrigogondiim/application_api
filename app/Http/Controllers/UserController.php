<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\{IndexUserRequest, StoreFriendRequest};
use App\Http\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

    public function __construct(private UserService $service)
    {   
    }

    public function index(IndexUserRequest $request): JsonResponse
    {
        $friends = $this->service->index($request->search);
        return response()->json($friends);
    }

    public function store(StoreFriendRequest $request): JsonResponse
    {
        return response()->json($this->service->store($request->user->id));
    }

    public function showFriends(): JsonResponse
    {
        return response()->json($this->service->showFriends());
    }

    public function showPedencyFriends(): JsonResponse
    {
        return response()->json($this->service->showPedencyFriends());
    }
}
