<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{

    use HasFactory;

    protected $fillable = ['name','kana','tel','email','postcode','address', 'birthday','gender', 'memo']; 

    public function scopeSearchCustomers($query, $input = null)
    {
    if(!empty($input)){
    if(Customers::where('kana', 'like', $input . '%' )
    ->orWhere('tel', 'like', $input . '%')->exists())
    {
    return $query->where('kana', 'like', $input . '%' )
    ->orWhere('tel', 'like', $input . '%');
    }
    }
    }
}
