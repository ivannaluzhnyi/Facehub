<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 05 Jul 2019 15:49:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Comment
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $username
 * @property string $email
 * @property int $post_id
 * @property int $user_id
 * @property string $content
 * 
 * @property \App\Models\Post $post
 *
 * @package App\Models
 */
class Comment extends Eloquent
{
	protected $casts = [
		'post_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'username',
		'email',
		'post_id',
		'user_id',
		'content'
	];

	public function post()
	{
		return $this->belongsTo(\App\Models\Post::class);
	}
}
