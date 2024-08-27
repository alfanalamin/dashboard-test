<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'name',
        'email',
        'product_id',
        'status_id',
        'province',
        'regency',
        'guard',
        'subdistrict',
        'address',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class); // Define the relationship
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
