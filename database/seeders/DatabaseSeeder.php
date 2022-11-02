<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Contact;
use Database\Factories\ContactFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        \App\Models\User::factory()->create([
//            'name' => 'nsk',
//            'email' => 'nsk@gmail.com',
//            'password'=>Hash::make('asdffdsa')
//        ]);
//        \App\Models\User::factory()->create([
//            'name' => 'nann',
//            'email' => 'nann@gmail.com',
//            'password'=>Hash::make('asdffdsa')
//        ]);
//         \App\Models\User::factory(10)->create();


        Contact::factory(100)->create();
    }
}
