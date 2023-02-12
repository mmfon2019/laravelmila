<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Genre;
use App\Models\Series;
use App\Models\Starring;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Series::truncate();
        User::truncate();
        Genre::truncate();
        Starring::truncate();

        $user = User::factory()->create();
        $genre1 = Genre::factory()->create();
        $genre2 = Genre::factory()->create();
        $starring1 = Starring::factory()->create();

        Series::factory(3)->create([
            'user_id'=> $user->id,
            'genre_id'=> $genre1->id,
            'starring_id'=> $starring1->id
        ]);

        Series::factory(2)->create([
            'user_id'=> $user->id,
            'genre_id'=> $genre2->id,
            'starring_id'=> $starring1->id
        ]);

    }
}