<?php
use App\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {
        // faker library instantiëren, om te gebruiken

        $faker = Faker\Factory::create();
        // nieuwe instantie van Room-model
        $news = new News();

        // willekeurig nummer en naam
        $news->en_intro = $faker->realText(20);
        $news->en_text = $faker->realText(150);
        $news->en_content = $faker->realText(2000);
        $news->nl_intro = $faker->sentence();
        $news->nl_text = $faker->paragraph(3);
        $news->nl_content = $faker->paragraph(20);
        $news->imgurl = $faker->imageUrl();

        // bewaren
        $news->save();
    }
}
