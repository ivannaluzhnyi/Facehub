<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 29 May 2019 09:30:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Post
 * 
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $name
 * @property string $slug
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Category $category
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $comments
 *
 * @package App\Models
 */
class Post extends Eloquent
{
	protected $casts = [
		'category_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'category_id',
		'user_id',
		'name',
		'slug',
		'content'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function comments()
	{
		return $this->hasMany(\App\Models\Comment::class);
	}
}
