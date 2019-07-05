<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 Jun 2019 17:59:04 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $name
 * @property int $slug_id
 * @property int $user_id
 * @property int $posts_count
 * 
 * @property \App\Models\Slug $slug
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $posts
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	protected $casts = [
		'slug_id' => 'int',
		'user_id' => 'int',
		'posts_count' => 'int'
	];

	protected $fillable = [
		'name',
		'slug_id',
		'user_id',
		'posts_count'
	];

	public function slug()
	{
		return $this->belongsTo(\App\Models\Slug::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function posts()
	{
		return $this->hasMany(\App\Models\Post::class);
	}
}
