<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferRequest extends Model
{
    use HasFactory;

    protected $table = 'offers';
    public $timestamps = false;


    protected $fillable = [
        'estimated_price',
        'estimated_start_time',
        'estimated_end_time',
      
    ];
}