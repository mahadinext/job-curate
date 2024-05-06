<?php

namespace App\Models\v1\careepick;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universities extends Model
{
    use HasFactory;

    public static function getAllUniversitiesData()
    {
        $processedData = [];

        self::chunk(100, function ($universities) use (&$processedData) {
            foreach ($universities as $university) {
                // Process each university data as needed
                // $processedData[] = $universities->toArray();
                $processedData[] = [
                    'id' => $university->id,
                    'university_name' => $university->university_name,
                    'slug' => $university->slug,
                ];
            }
        });

        return $processedData;
    }
}
