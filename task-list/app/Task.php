<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['name','user_id','date','finished'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
