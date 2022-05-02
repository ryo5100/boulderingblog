<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Comment;
class Post extends Model

{
  use SoftDeletes;
  
  protected $attributes = [
        'comment_id' => '0',
    ];
  protected $fillable = [
    'title',
    'body',
    'user_id',
    
  
    ];
  public function getpaginateByLimit(int $limit_count = 10)
  {
      return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);//updated_atで順列に並べあと、limitで件数制限をかける
  }
  public function user()
  {
    return $this->belongsTo('App\User');
    
  }
  public function comments()
  {
    return $this->hasMany('App\Comment');
  }
  
  
  

}
