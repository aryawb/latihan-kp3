<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
	return view('auth.login');
});
Route::get('/dashboard', function () {
	return view('dashboard');
});
Auth::routes(['verify' => true]);

// function(e) {
//   callback && !1 === callback(e) || component.callAfterModelDebounce((function() {
//     var el = e.target;
//     directive.setEventContext(e), _this2.preventAndStop(e, directive.modifiers);
//     var _component$scopedList, method = directive.method,
//       params = directive.params;
//     if (0 === params.length && e instanceof CustomEvent && e.detail && params.push(e.detail), "$emit" === method) return (_component$scopedList = component.scopedListeners).call.apply(_component$scopedList, _