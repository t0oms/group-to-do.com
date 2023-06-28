<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(['name'=> 'User1', 'email' => 'user1@gmail.com', 'password' => bcrypt('password')]);
        User::create(['name'=> 'User2', 'email' => 'user2@gmail.com', 'password' => bcrypt('password')]);
        User::create(['name'=> 'Toms', 'email' => 'tomspetersons03@gmail.com', 'password' => bcrypt('password')]);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test',
        //     'email' => 'test@example.com',
        // ]);


        // Group::create(['name' => 'Group number 1', 'madeBy_id' => '1']);
        // Group::create(['name' => 'Group number 2', 'madeBy_id' => '1']);
        // Group::create(['name' => 'Group number 3', 'madeBy_id' => '1']);
        // Group::create(['name' => 'Group number 4', 'madeBy_id' => '2']);
        // Group::create(['name' => 'Group number 5', 'madeBy_id' => '2']);
        // Group::create(['name' => 'Group number 6', 'madeBy_id' => '2']);
        // Group::create(['name' => 'Group number 7', 'madeBy_id' => '3']);
        // Group::create(['name' => 'Group number 8', 'madeBy_id' => '3']);
        // Group::create(['name' => 'Group number 9', 'madeBy_id' => '3']);

        // $user->groups()->attach()




        // Group::create(['name' => 'Group number 2']);
        // Group::create(['name' => 'Group number 3']);
        // Group::create(['name' => 'Group number 4']);
        // Group::create(['name' => 'Group number 5']);

        // $users = User::all();
        // $groups = Group::all();

        // foreach ($users as $user) {
        //     // Attach random groups to the user
        //     $user->groups()->attach($groups->random(rand(1, 5))->pluck('id'));
        // }
    }
}
