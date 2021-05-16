<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price','user_id','created_at','updated_at'];

    protected $table = "products";

    protected $primaryKey = 'id';

    public function user(){

    	return $this->belongsTo(User::class);
    }

}
