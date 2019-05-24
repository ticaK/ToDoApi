<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['user_id','title','description','priority','completed'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}