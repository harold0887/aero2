<?php

namespace Database\Seeders;



use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'status' => 'Success',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Status::create([
            'status' => 'Pending',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Status::create([
            'status' => 'In process',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
