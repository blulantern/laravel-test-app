<?php

namespace App\Traits;
use Illuminate\Http\JsonResponse;

trait Jsonable {

    public function outputJson() {
        return $this->toJson();
    }
}
