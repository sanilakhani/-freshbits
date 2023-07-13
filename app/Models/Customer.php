<?php

namespace App\Models;

use Carbon\Carbon;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "customers";
    public $timestamps = true;
    protected $fillable = ['name','dob','phone','email','status'];

    protected $guarded = ['id'];

    // protected $casts = [
    //     'status' => StatusEnum::class
    // ];

    public function getDobAttribute($value)
    {
        if ($value == '0000-00-00') {
            return;
        }
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }
}
