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
                     'value' => 'files/weweewe.jpg',
                     'type' => 'image'
                 ],[
                     'name' => 'slider_image',
                     'value' => 'files/12312312.jpg',
                     'type' => 'slider_image',
                 ],[
                     'name' => 'slider_image',
                     'value' => 'files/Xr9oC8yTb3Nh7FcY9icPYfv51nrhWvobEyfNSpSo.jpeg',
                     'type' => 'slider_image',
                 ],[
                     'name' => 'main_content',
                     'value' => 'Основной контент',
                 ],[
                     'name' => 'footer_content',
                     'value' => 'Контент подвала',
                 ],[
                     'name' => 'email',
                     'value' => 'admin.admin@gmail.com',
                 ]]);

        $homePage->save();
    }
}
