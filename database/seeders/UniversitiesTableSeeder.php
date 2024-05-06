<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UniversitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            // Read SQL file content
            $sqlContent = file_get_contents(public_path('seeder-file/universities.sql'));

            // Split SQL statements
            $sqlStatements = explode(';', $sqlContent);

            // Remove empty statements
            $sqlStatements = array_filter($sqlStatements);

            // Execute each SQL statement
            foreach ($sqlStatements as $sql) {
                DB::statement($sql);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
