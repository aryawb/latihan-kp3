<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
	protected $fillable = ['user', 'friend'];


	public function user()
	{
		return $this->belongsTo('App\Models\User', 'friend', 'id');
	}
	public function walik()
	{
		return $this->belongsTo('App\Models\User', 'id', 'friend');
	}
	public function list_teman()
	{
		return $this->hasMany('App\Models\User', 'id', 'friend');
	}



}
