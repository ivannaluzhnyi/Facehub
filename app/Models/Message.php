<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 07 May 2019 09:59:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Message
 * 
 * @property int $id
 * @property string $message
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id_author
 *
 * @package App\Models
 */
class Message extends Eloquent
{
	protected $casts = [
		'id_author' => 'int'
	];

	protected $fillable = [
		'message',
		'id_author'
	];
}
