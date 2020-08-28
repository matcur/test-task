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
                     'value' => 'fuck.png',
                 ],[
                     'name' => 'slider_image',
                     'value' => 'fuck1.png',
                     'doHasMany' => true,
                     'input_type' => 'image',
                 ],[
                     'name' => 'slider_image',
                     'value' => 'fuck2.png',
                     'doHasMany' => true,
                     'input_type' => 'image',
                 ],[
                     'name' => 'main_content',
                     'value' => 'This is the fucking main content',
                 ],[
                     'name' => 'footer_content',
                     'value' => 'This is the fucking footer content',
                 ],[
                     'name' => 'email',
                     'value' => 'Fuck you',
                 ]]);

        $homePage->save();
    }
}
