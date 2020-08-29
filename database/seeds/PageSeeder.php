<?php

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homePage = factory(Page::class, 1)->make(['name' => 'home'])->first();
        $homePage->pageProperties()
                 ->createMany([[
                     'name' => 'title',
                     'value' => 'This is the title',
                 ],[
                     'name' => 'logo_path',
                     'value' => 'qwer.jpg',
                 ],[
                     'name' => 'slider_image',
                     'value' => 'qwer.jpg',
                     'type' => 'slider_image',
                 ],[
                     'name' => 'slider_image',
                     'value' => 'qwer.jpg',
                     'type' => 'slider_image',
                 ],[
                     'name' => 'main_content',
                     'value' => 'This is the main content',
                 ],[
                     'name' => 'footer_content',
                     'value' => 'This is the footer content',
                 ],[
                     'name' => 'email',
                     'value' => 'ru.far2014@yandex.ru',
                 ]]);

        $homePage->save();
    }
}
