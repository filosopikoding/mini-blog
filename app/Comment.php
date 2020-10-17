<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*tugas membuat model eloquent untuk data comment*/
class Comment extends Model
{
  protected $fillable = ['name', 'email', 'website', 'comment'];

	public function post()
	{
		return $this->belongsTo(Post::class);
	}
}
