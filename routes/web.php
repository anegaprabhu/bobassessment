<?php
Route::view('/', 'welcome');
Auth::routes();
Route::get('/home', 'FranchiseeController@index')->name('home');

Route::get('/login/parents', 'Auth\LoginController@showParentsLoginForm')->name('login.parents');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm')->name('login.writer');


Route::get('/register/parents', 'Auth\RegisterController@showParentsRegisterForm')->name('register.parents');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm')->name('register.writer');

Route::post('/login', 'Auth\LoginController@Login');
Route::post('/login/parents', 'Auth\LoginController@parentsLogin');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/writer', 'Auth\LoginController@writerLogin');


Route::post('/register/parents', 'Auth\RegisterController@createParents')->name('register.parents');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
Route::post('/register/writer', 'Auth\RegisterController@createWriter')->name('register.writer');

//Route::view('/home', 'home')->middleware('auth');

//Route::get('/logout', 'HomeController@logout')->name('logout');


//Route::post('/logout', 'Auth\LoginController@logout');


Route::get('/logout/parents', 'Auth\LoginController@parentsLogout');


Route::group(['middleware' => 'auth:parents'], function () {
    Route::resource('/parents', 'ParentController');

    //handle exam page
    Route::resource('exam', 'ExamController');
    Route::resource('student', 'StudentController');
    Route::resource('instruction', 'TestinstructionController');
    Route::post('student/store','StudentController@store');
    Route::post('exam/store','ExamController@store');

});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});

Route::group(['middleware' => 'auth:writer'], function () {
    Route::view('/writer', 'writer');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('home/get-state-list','HomeController@getStateList');
Route::get('home/get-city-list','HomeController@getCityList');

Route::post('home/store', 'FranchiseeController@store');