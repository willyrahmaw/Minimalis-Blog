<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['blog_name', 'blog_description', 'blog_keywords', 'blog_author'];
}
