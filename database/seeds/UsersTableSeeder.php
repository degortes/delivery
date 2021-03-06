<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
 {
     $our_names = ['Alessio', 'Giacomo','Manuel','Roberta','Danilo'];
     for ($i=0; $i < 5 ; $i++) {

           $new_user = new User();
           $new_user->name = $our_names[$i];
           $new_user->email = $our_names[$i].'@'.$our_names[$i].'.it';
           $new_user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
           $new_user->address = $faker->unique()->address();
           $new_user->VAT_number = ($faker->unique()->randomNumber($nbDigits = 9)).'22';
           $new_user->save();
        }
   }
}
