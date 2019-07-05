<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 05 Jul 2019 15:49:47 +0000.
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
 * @property string $img
 * @property int $slug_id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Category $category
 * @property \App\Models\Slug $slug
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $comments
 *
 * @package App\Models
 */
class Post extends Eloquent
{
	protected $casts = [
		'category_id' => 'int',
		'user_id' => 'int',
		'slug_id' => 'int'
	];

	protected $fillable = [
		'category_id',
		'user_id',
		'name',
		'img',
		'slug_id',
		'content'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function slug()
	{
		return $this->belongsTo(\App\Models\Slug::class);
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
