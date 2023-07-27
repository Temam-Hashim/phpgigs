<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Jobs;
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
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Temam Hashim',
        //     'email' => 'temam@example.com',
        //     'password'=>'password'
        // ]);

        // Listing::create([
        //     'title'=>"PHP Senior Developer",
        //     'tags'=>'PHP',
        //     'company'=>'Tcoder',
        //     'location'=>'Addis Ababa',
        //     'email'=>'tcoder@gmail.com',
        //     'website'=>'https://www.temxtech.vercel.app',
        //     'description'=>'Remember that synonyms are specific to the database system you are using,
        //                     and not all database systems support synonyms directly. In some cases,
        //                     you may need to use alternative approaches, like views or functions,
        //                     to achieve similar functionality.'
        // ]);
        // Listing::create([
        //     'title'=>"Wordpress Developer",
        //     'tags'=>'PHP,Wordpress',
        //     'company'=>'Tcoder',
        //     'location'=>'Addis Ababa',
        //     'email'=>'tcoder@gmail.com',
        //     'website'=>'https://www.temxtech.vercel.app',
        //     'description'=>'Remember that synonyms are specific to the database system you are using,
        //                     and not all database systems support synonyms directly. In some cases,
        //                     you may need to use alternative approaches, like views or functions,
        //                     to achieve similar functionality.'
        // ]);

        Jobs::factory(8)->create();
    }
}
