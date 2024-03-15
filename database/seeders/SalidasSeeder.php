<?php

namespace Database\Seeders;



use App\Models\Salida;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Salida::create([
            'salida' => 'Aeroméxico agradece su preferencia.',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Salida::create([
            'salida' => 'lamentamos no poder brindarle una respuesta favorable.',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Salida::create([
            'salida' => 'esperando que este incidente no influya en usted al momento de elegir sus viajes, esperamos contar con usted en uno más de nuestros vuelos',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Salida::create([
            'salida' => 'me apena mucho no poder apoyarle a través de este medio. Sin más por el momento, le deseo un excelente día',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Salida::create([
            'salida' => 'le ofrezco una sincera disculpa por todos los inconvenientes ocasionados. Siento mucho la percepción del servicio recibido. Espero sinceramente que su comprensión le permita considerar que para Aeroméxico será un placer darle la bienvenida a bordo de nuestras aeronaves',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Salida::create([
            'salida' => 'lamento mucho no poder brindarle una respuesta distinta. Tenga la certeza de que la resolución proporcionada se basa totalmente en lo estipulado en el contrato que aceptó y adquirió inicialmente.',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Salida::create([
            'salida' => 'agradezco y confió en su comprensión ante la información que le comparto. Sin más que añadir, le envío un cordial saludo deseándole una excelente tarde.

            ',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Salida::create([
            'salida' => 'tenga la certeza de que las medidas aplicadas siempre son en búsqueda del bienestar financiero de nuestros clientes y asociados',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Salida::create([
            'salida' => 'lamento no poder brindarle una respuesta inmediata.',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
      
    }
}
