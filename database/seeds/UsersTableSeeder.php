<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
        $user = User::where('email','henrique.gonzaga@live.com')->first();

        if(!$user){
            User::create([
                'name' => 'Pedro Henrique',
                'email' => 'henrique.gonzaga@live.com',
                'password' => Hash::make('teste123'),
                'role' => 'admin'
            ]);
        }else{
            if($user->role != 'admin'){
                $user->role = 'admin';
                $user->save();
            }
        }
    }
}
