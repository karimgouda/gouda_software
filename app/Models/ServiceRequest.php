<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','phone','address','service_id'];

    public static  $rules = [

        'name'=>'required|string|min:3|max:255',
        'email'=>'required|string|min:6|max:255',
        'phone'=>'required|string|min:4|max:20',
        'address'=>'required|string|min:4|max:255',
        // 'service_id'=>'required|exists:services,id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class , 'service_id');
    }
}
