<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Carbon\MessageFormatter\LazyMessageFormatter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\VarDumper\Dumper\esc;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exist = User::where('email', 'admin@gmail.com')->first();
        if (!$exist) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'user_role' => 'admin',
                'password' => Hash::make('password'),
                'email_verified_at' => Carbon::now(),
            ]);
        }
    }
}
