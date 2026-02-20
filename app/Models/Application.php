<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table = 'applications';
    protected $fillable = [
        'user_id',
        'jobposting_id',
        'cover_letter',
        'resume_path',
        'status',
    ];

    public function job()
    {
        return $this->belongsTo(jobposting::class, 'jobposting_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
