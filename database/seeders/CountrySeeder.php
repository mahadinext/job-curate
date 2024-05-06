<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            // Path to the SQL file
            $sqlFilePath = public_path('seeder-file/countries.sql');

            // Read SQL file content
            $sqlContent = File::get($sqlFilePath);

            // Run the SQL queries
            DB::unprepared($sqlContent);

            $this->command->info('Countries seeded successfully!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
