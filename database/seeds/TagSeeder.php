<?php

use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=['carne','vegan','gluten free','pesce'];
        foreach($tags as $tag_name){
            $new_tag= new Tag();
            $new_tag->title = $tag_name;
            $new_tag->slug = Str::of($tag_name)->slug('-');
            $new_tag->save();
        }
    }
}
