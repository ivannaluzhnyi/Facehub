<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 05 Jul 2019 15:49:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $avatar
 * @property \Carbon\Carbon $date_of_birth
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $categories
 * @property \Illuminate\Database\Eloquent\Collection $posts
 * @property \Illuminate\Database\Eloquent\Collection $slugs
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $dates = [
		'email_verified_at',
		'date_of_birth'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'avatar',
		'date_of_birth',
		'remember_token'
	];

	public function categories()
	{
		return $this->hasMany(\App\Models\Category::class);
	}

	public function posts()
	{
		return $this->hasMany(\App\Models\Post::class);
	}

	public function slugs()
	{
		return $this->hasMany(\App\Models\Slug::class);
	}
}
