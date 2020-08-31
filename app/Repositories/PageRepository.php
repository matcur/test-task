<?php


namespace App\Repositories;


use App\Models\Page;
use App\Models\PageProperty;
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
        $requestProperties = $request->except(['_token', '_method']);

        $this->removeProperties($page);

        $this->updateInput($requestProperties, $page);
    }

    public function removeProperties(Page $page)
    {
        $page->pageProperties->map(function(PageProperty $property) {
            $property->delete();
        });
    }

    public function updateInput($requestProperties, Page $page)
    {
        foreach ($requestProperties as $key => $value) {
            //Если $value это массив, то его нужно сохранить
            //
            if (is_array($value)) {
                $values = [];
                foreach ($value as $item) {
                    $values[] = [
                        'name' => $key,
                        'value' => $item,
                        'type' => $key,
                    ];
                }

                $page->pageProperties()
                     ->createMany($values);
                continue;
            }

            $page->pageProperties()
                 ->create([
                     'name' => $key,
                     'value' => $value,
                 ]);
        }
    }
}
