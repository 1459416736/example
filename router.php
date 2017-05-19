<?php

use function Wing\Example\base_path as component_base_path;

Route::middleware('web')
    ->namespace('Wing\\Example\\Controllers')
    ->group(component_base_path('/routes/web.php'));

Route::prefix('api/v1')
    ->middleware('api')
    ->namespace('Wing\\Example\\Controllers')
    ->group(component_base_path('/routes/api.php'));
