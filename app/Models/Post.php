<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'text',
        'view',
        'pic_address',
        'user_id'
    ];

    public function getViewCountAttribute()
    {
        return $this->view;
    }

    public function viewPlus()
    {
        $viewcount = $this->getViewCountAttribute();
        $viewcount++;
        return $viewcount;
    }

    public function makeImageAddress($image)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        return $imageName;
    }



    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
