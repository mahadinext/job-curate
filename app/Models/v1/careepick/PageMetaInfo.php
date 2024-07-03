<?php

namespace App\Models\v1\careepick;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageMetaInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name',
        'title',
        'meta_author_name',
        'meta_description',
        'meta_keywords',
    ];
}
