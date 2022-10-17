<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /* 1920 x 1280 */
    public static function getRandomImage()
    {
        $rand  = rand(1, 24);
        $rand  = $rand < 10 ? "0{$rand}" : "$rand";
        $image = "img_post_{$rand}.jpg";
        if( Post::where('image', $image)->exists() ){
            self::getRandomImage();
        }

        return $image;
    }


    public function run()
    {
        $txt = "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.";

        /* User Data */
        $json = File::get(public_path() . '/files/users.json');
        $objs = json_decode($json);
        foreach($objs as $obj){
            DB::table('users')->insert([
                'name'       => $obj->name,
                'email'      => $obj->email,
                'role'       => $obj->role,
                'phone'      => $obj->phone,
                'address'    => $obj->address,
                'password'   => Hash::make('password'),
                'created_at' => $obj->created_at,
            ]);
        }


        /* Category Data */
        $json = File::get(public_path() . '/files/categories.json');
        $objs = json_decode($json);
        foreach($objs as $obj){
            DB::table('categories')->insert([
                'name'       => $obj->name,
                'slug'       => Str::slug($obj->name),
                'logo'       => $obj->logo,
                'color'      => $obj->color,
                'created_at' => $obj->created_at,
            ]);
        }


        /* Tag Data */
        $json = File::get(public_path() . '/files/tags.json');
        $objs = json_decode($json);
        foreach($objs as $obj){
            DB::table('tags')->insert([
                'name'       => $obj->name,
                'slug'       => Str::slug($obj->name),
                'created_at' => $obj->created_at,
            ]);
        }


        /* Post Data */
        $json = File::get(public_path() . '/files/posts.json');
        $objs = json_decode($json);

        foreach($objs as $obj){
            $img = self::getRandomImage();
            DB::table('posts')->insert([
                'id'         => $obj->id,
                'user_id'    => User::all()->random()->id,
                'title'      => $obj->title,
                'content'    => $txt,
                'image'      => $img,
                'slug'       => Str::slug($obj->title),
                'view_count' => rand(10, 100),
                'status'     => 1,
                'created_at' => $obj->created_at,
            ]);

            DB::table('category_post')->insert([
                'post_id'     => $obj->id,
                'category_id' => $obj->category_id,
                'created_at'  => $obj->created_at,
            ]);

            DB::table('post_tag')->insert([
                'post_id'     => $obj->id,
                'tag_id'      => $obj->tag_id,
                'created_at'  => $obj->created_at,
            ]);
        }

        /* Comment Data */
        //for($i = 0; $i<50; $i++){
        //    
        //}
    }
}
