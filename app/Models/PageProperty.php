<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageProperty extends Model
{
    protected $fillable = [
        'name',
        'page_name',
        'value',
        'doHasMany',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_name', 'name');
    }
}
