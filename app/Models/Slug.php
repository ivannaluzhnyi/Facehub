<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 Jun 2019 17:59:04 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Slug
 * 
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $categories
 * @property \Illuminate\Database\Eloquent\Collection $posts
 *
 * @package App\Models
 */
class Slug extends Eloquent
{
	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'name',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function categories()
	{
		return $this->hasMany(\App\Models\Category::class);
	}

	public function posts()
	{
		return $this->hasMany(\App\Models\Post::class);
	}
}
