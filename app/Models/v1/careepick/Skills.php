<?php

namespace App\Models\v1\careepick;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'skill_name',
        'job_category_id',
        'slug',
        'remarks',
    ];

    public static function getAllData()
    {
        $processedData = [];

        self::chunk(100, function ($skills) use (&$processedData) {
            foreach ($skills as $skill) {
                $processedData[] = [
                    'id' => $skill->id,
                    'skill_name' => $skill->skill_name,
                    'job_category_id' => $skill->job_category_id,
                    'slug' => $skill->slug,
                ];
            }
        });

        return $processedData;
    }
}
