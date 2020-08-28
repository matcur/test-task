<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $primaryKey = 'name';

    protected $keyType = 'str';

    protected $fillable = [
        'name',
    ];

    public function pageProperties()
    {
        return $this->hasMany(PageProperty::class, 'page_name', 'name');
    }

    public function hasPageProperty($key)
    {
        return (bool) $this->pageProperties()->get()->filter(function (PageProperty $property) use ($key) {
            return $property->name == $key;
        })->count();
    }

    public function getPageProperty($key)
    {
        $properties = $this->pageProperties()->get()->filter(function (PageProperty $property) use ($key) {
            return $property->name == $key;
        });

        return $properties->count() == 1 ? $properties->first()->value : $properties;
    }

    //Возвращает значение колонны 'value' по колонне 'key' = $key
    //из PageProperty, если они существуют, иначе запускает 'магию' ларавеля
    public function __get($key)
    {
        if ($this->hasPageProperty($key)) {
            return $this->getPageProperty($key);
        }

        return parent::__get($key);
    }
}
