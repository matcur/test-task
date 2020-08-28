<?php


namespace App\Repositories;


use App\Models\Page;
use Illuminate\Http\Request;

class PageRepository extends AbstractRepository
{
    public function getModel()
    {
        return new Page();
    }

    public function find($key)
    {
        return $this->getModel()
                    ->find($key);
    }

    public function update(Request $request, Page $page)
    {
        $pageProperties = $page->pageProperties;
        $requestProperties = $request->input();

        $this->updateInput($requestProperties, $pageProperties);
        $this->updateFiles($requestProperties, $pageProperties);
    }

    public function updateInput($requestProperties, $pageProperties)
    {
        foreach($requestProperties as $key => $value) {
            $pageProperties->map(function ($property) use ($key, $value) {
                if ($property->name == $key) {
                    $property->value = $value;
                    $property->save();
                }
            });
        }
    }

    public function updateFiles($requestProperties, $pageProperties)
    {

    }
}
