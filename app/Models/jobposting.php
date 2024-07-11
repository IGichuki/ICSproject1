<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobposting extends Model
{
    use HasFactory;
    protected $table = 'jobpostings';
    public $timestamps = false;
    protected $fillable = [
        'job_title',
        'job_description',
        'job_location',
        'job_type',
        'job_category',
        'experience',
        'salary',
        'company_name',
        'company_description',
        'company_website',
        'how_to_apply',
        'application_deadline',
    ];
}
