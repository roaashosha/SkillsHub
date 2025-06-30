<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\App;

class Skill extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    public function cat(){
        return $this->belongsTo(Cat::class);
    }

    public function exams(){
        return $this->hasMany(Exam::class);
    }
    public function name($lang = null){
        $lang = $lang??App::getLocale();
        return json_decode($this->name)->$lang;
    
    }

    public function getStudentsCount(){
        $stdNum = 0;
        foreach ($this->exams as $exam){
            $stdNum+=$exam->users->count();
        }
        return $stdNum;
    }
}
