<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ScheduledClass extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function instrudoctor()
    {
        return $this->belongsTo(User::class,'instructor_id');
    }
    public function classType()
    {
        return $this->belongsTo(ClassType::class);
    }
    public function members()
    {
        return $this->belongsToMany(User::class,'bookings');

    }

    //نشون می ده رکورد ها منقضی شده یا نه

    public function scopeUpcoming(Builder $query)
    {
        return $query->where('date_time','>',now());
    }

    //نشون می ده که این کلاس قبلا رزرو شده یا نه

    public function scopeNotBooked(Builder $query)
    {
        return $query->whereDoesntHave('members',function ($query)
        {
            $query->where('user_id',auth()->user()->id);
        });
    }

}
