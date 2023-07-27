<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;
    // protected $fillable = ['title','company','email','website','description','tags','location'];

    public function scopeFilter($query, $filters){
        // dd($filters);
        // filter by tag
       if($filters['tag'] ?? false){
         $query->where('tags','like','%'.request('tag').'%');
       }

        //    search by keyword
        if($filters['search'] ?? false){
            $query->where('title','like','%'.request('search').'%')
            ->orWhere('description','like','%'.request('search').'%')
            ->orWhere('tags','like','%'.request('search').'%');

        }
    }

}
