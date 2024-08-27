<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    protected $fillable = [
        'name',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the CSS class for the badge based on the status name.
     */
    public function getBadgeClass()
    {
        switch ($this->name) {
            case 'Member':
                return 'primary';
            case 'No Member':
                return 'danger';
            case 'Member Baru':
                return 'warning';
            default:
                return 'secondary';
        }
    }
}
