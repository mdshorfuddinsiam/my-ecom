<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blogpost extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function blogcategory(){
    	return $this->belongsTo(Blogcategory::class);
    }
    
    public function admin(){
    	return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function comments(){
    	return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    
    public function allcomments(): HasMany
    {
        return $this->hasMany(Comment::class, 'blogpost_id', 'id');
    }
    
}
