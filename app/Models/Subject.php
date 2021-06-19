<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'semester_id',
        'full_marks',
        'passing_marks'
    ];


    public function semester(){
        $this->belongsTo(Semester::class,'semester_id','id');
    }






}
