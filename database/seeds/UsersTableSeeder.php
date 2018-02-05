<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use loja\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        DB::table('users')->delete();

        $users = array(
                ['name' => 'admin', 'email' => 'admin@mail.com', 'password' => Hash::make('admin')],
        );

        foreach ($users as $user)
        {
            User::create($user);
        }

        Model::reguard();
    }
}
