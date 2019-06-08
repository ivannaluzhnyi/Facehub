<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 31 May 2019 14:27:30 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $posts
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

	public function posts()
	{
		return $this->hasMany(\App\Models\Post::class);
	}
}
