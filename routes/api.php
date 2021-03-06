<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Event Route
Route::apiResource('event','API\EventController');
Route::apiResource('Profile','API\ProfileController');
Route::get('interest/{id}', 'API\ProfileController@interestShow');
Route::delete('interestDelete/{id}', 'API\ProfileController@interestDelete');
Route::post('personalInterest', 'API\ProfileController@interestStore');
Route::put('InterestUpdate/{id}', 'API\ProfileController@interestUpdate');
Route::get('follow/{id}', 'API\FriendController@followOrNot');
Route::get('followStaus/{id}', 'API\FriendController@followStaus');
//UserList
Route::get('loadUserList', 'API\EventController@userList');
//Evenvt Type Wise Data
Route::get('eventWithType/{id}', 'API\EventController@eventWithType');

Route::get('insterestupdate/{id}', 'API\InterestedOnEventController@insterestupdate');
Route::get('goingupdate/{id}', 'API\InterestedOnEventController@goingupdate');
Route::get('totalGoing/{id}', 'API\InterestedOnEventController@totalgoing');
Route::get('totalInterested/{id}', 'API\InterestedOnEventController@totalinterested');
Route::post('search', 'API\SearchController@search');

//Total following or followers
Route::get('totalFollwing/{id}', 'API\ProfileController@totalFollwing');
Route::get('totalFollowers/{id}', 'API\ProfileController@totalFollowers');
//Profile type
Route::get('profileType', 'API\ProfileController@profileTypeChange');

// Schedule Route
Route::apiResource('schedule','API\SchedulerController');

//DailySchedule Route
Route::get('dailyEvent/', 'API\DailyScheduleController@DailyEvent');
Route::get('dailySchedule/', 'API\DailyScheduleController@DailySchedulet');

//followers AND following Route
Route::get('following/{id}', 'API\ProfileController@following');
Route::get('followers/{id}', 'API\ProfileController@followers');