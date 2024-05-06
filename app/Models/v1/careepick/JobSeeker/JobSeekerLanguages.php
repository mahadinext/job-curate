<?php

namespace App\Models\v1\careepick\JobSeeker;

use App\Models\v1\careepick\Languages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobSeekerLanguages extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_seeker_id',
        'language_id',
        'proficiency',
        'slug',
        'remarks',
    ];

    protected $table = 'job_seeker_languages';

    public function language()
    {
        return $this->belongsTo(Languages::class, 'language_id');
    }
}
