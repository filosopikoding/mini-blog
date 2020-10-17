<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*tugas membuat model eloquent untuk data post*/
class Post extends Model
{
	protected $fillable = ['user_id', 'title', 'slug', 'content'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function comments()
	{
    return $this->hasMany(Comment::class);
	}

	#scope function
  public function scopeLatestFirst($query)
  {
    return $query->orderBy('created_at', 'desc');
  }
}
