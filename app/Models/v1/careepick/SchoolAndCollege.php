<?php

namespace App\Models\v1\careepick;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAndCollege extends Model
{
    use HasFactory;

    public static function getAllSchoolAndCollegeData()
    {
        $processedData = [];

        self::chunk(100, function ($schoolAndColleges) use (&$processedData) {
            foreach ($schoolAndColleges as $schoolAndCollege) {
                $processedData[] = [
                    'id' => $schoolAndCollege->id,
                    'institute_name' => $schoolAndCollege->institute_name,
                    'institute_type' => $schoolAndCollege->institute_type,
                    'slug' => $schoolAndCollege->slug,
                ];
            }
        });

        return $processedData;
    }

    public static function getAllDataByInstitutionType(...$institutionTypes)
    {
        $processedData = [];

        self::whereIn('institute_type', $institutionTypes)->chunk(100, function ($schoolAndColleges) use (&$processedData) {
            foreach ($schoolAndColleges as $schoolAndCollege) {
                $processedData[] = [
                    'id' => $schoolAndCollege->id,
                    'institute_name' => $schoolAndCollege->institute_name,
                    'institute_type' => $schoolAndCollege->institute_type,
                    'slug' => $schoolAndCollege->slug,
                ];
            }
        });

        return $processedData;
    }

    public static function getAllMadrashaData()
    {
        $processedData = [];

        self::where('institute_type', 'Madrasha')->chunk(100, function ($schoolAndColleges) use (&$processedData) {
            foreach ($schoolAndColleges as $schoolAndCollege) {
                $processedData[] = [
                    'id' => $schoolAndCollege->id,
                    'institute_name' => $schoolAndCollege->institute_name,
                    'institute_type' => $schoolAndCollege->institute_type,
                    'slug' => $schoolAndCollege->slug,
                ];
            }
        });

        return $processedData;
    }

    public static function getAllSchoolData()
    {
        $processedData = [];

        self::whereIn('institute_type', ['School', 'School and College'])->chunk(100, function ($schoolAndColleges) use (&$processedData) {
            foreach ($schoolAndColleges as $schoolAndCollege) {
                $processedData[] = [
                    'id' => $schoolAndCollege->id,
                    'institute_name' => $schoolAndCollege->institute_name,
                    'institute_type' => $schoolAndCollege->institute_type,
                    'slug' => $schoolAndCollege->slug,
                ];
            }
        });

        return $processedData;
    }

    public static function getAllCollegeData()
    {
        $processedData = [];

        self::where('institute_type', 'College')->chunk(100, function ($schoolAndColleges) use (&$processedData) {
            foreach ($schoolAndColleges as $schoolAndCollege) {
                $processedData[] = [
                    'id' => $schoolAndCollege->id,
                    'institute_name' => $schoolAndCollege->institute_name,
                    'institute_type' => $schoolAndCollege->institute_type,
                    'slug' => $schoolAndCollege->slug,
                ];
            }
        });

        return $processedData;
    }
}
