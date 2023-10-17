<?php

use Illuminate\Support\Facades\Route;

Route::get('ping', function(){
    return csrf_token();
});

Route::post('create_student', [\App\Http\Module\Student\Presentation\Controller\StudentController::class, 'createStudent']);