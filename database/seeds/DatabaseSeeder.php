<?php

use App\Models\Alphabet;
use App\Models\Chapter;
use App\Models\Role;
use App\Models\Rule;
use App\Models\User;
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
        // $this->call(UsersTableSeeder::class);

        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'rater'
        ]);
        Role::create([
            'name' => 'student'
        ]);
        User::create([
           'name' => 'admin',
           'email' => 'admin@admin.com',
           'role_id' => 1,
           'password' => bcrypt('admin'),
        ]);
        User::create([
            'name' => 'usman dar',
            'email' => 'usmandar@renesistech.com',
            'role_id' => 2,
            'logIn_id' => "usman",
            'age' => "25",
            'gender' => "male",
            'nationality' => "pakistani",
            'password' => bcrypt('admin'),

        ]);
        User::create([
            'name' => 'ahsan memon',
            'email' => 'ahsanmemon@renesistech.com',
            'role_id' => 2,
            'logIn_id' => "ahsan",
            'age' => "30",
            'gender' => "male",
            'nationality' => "pakistani",
            'password' => bcrypt('admin'),

        ]);

        User::create([
            'name' => 'waleed',
            'email' => 'waleed@renesistech.com',
            'role_id' => 3,
            'logIn_id' => "waleed",
            'age' => "24",
            'gender' => "male",
            'nationality' => "pakistani",
            'password' => bcrypt('admin'),

        ]);

        User::create([
            'name' => 'sajid',
            'email' => 'sajid.ali@renesistech.com',
            'role_id' => 3,
            'logIn_id' => "sajid",
            'age' => "28",
            'gender' => "male",
            'nationality' => "pakistani",
            'password' => bcrypt('admin'),

        ]);

//        $rules = ['Zabar','Zair','Shad','Madd','Paish'];
//        foreach ($rules as $rule){
//          $ch =  Rule::create([
//                'name' => $rule
//            ]);
//        }
    }
}
