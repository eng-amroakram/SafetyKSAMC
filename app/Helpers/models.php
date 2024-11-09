<?php

use App\Http\Controllers\Services\Services;



if (!function_exists('models_count')) {
    function models_count($model)
    {
        if ($model == 'User') {
            $model =  Services::modelInstance($model);
            return $model::where('type', 'employee')->count();
        }

        $model =  Services::modelInstance($model);
        return $model::count();
    }
}
