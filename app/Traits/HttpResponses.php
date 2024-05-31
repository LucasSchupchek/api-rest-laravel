<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\MessageBag;
use Ramsey\Uuid\Type\Integer;

trait HttpResponses{
    public function response(string $message, string|int $status, array|Model|JsonResource $data = []){
        return response()->json([
            'message' => $message,
            'status' => $status,
            'data' => $data
        ]);
    }

    public function error(string $message, string|int $status, array|MessageBag $errors = [], array|Model|JsonResource $data = []){
        return response()->json([
            'message' => $message,
            'status' => $status,
            'errors' => $errors,
            'data' => $data
        ]);
    }
}