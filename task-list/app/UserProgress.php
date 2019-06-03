<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    protected $table = 'user_progresses';

    public $timestamps = false;

    protected $fillable = ['tasks_per_day','current_streak','max_streak','last_streak_update'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
