<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 29 May 2019 09:59:20 +0000.
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
 * @property string $slug
 * @property int $posts_count
 * 
 * @property \Illuminate\Database\Eloquent\Collection $posts
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	protected $casts = [
		'posts_count' => 'int'
	];

	protected $fillable = [
		'name',
		'slug',
		'posts_count'
	];

	public function posts()
	{
		return $this->hasMany(\App\Models\Post::class);
	}
}
