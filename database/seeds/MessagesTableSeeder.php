<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::truncate();

        for ($i = 1; $i <= 100; $i++) {
	        Message::create([
	        	'nombre' => "Usuario {$i}",
	        	'email' => "usuario{$i}@email.com",
	        	'mensaje' => "mensaje {$i} de prueba"
	        ]);
        }

    }
}
