<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingMeja extends Model
{
    use HasFactory;

    protected $table = "booking_meja";

    protected $guarded = [''];

    public $timestamps = false;

    public function rs_booking()
    {
        return $this->belongsTo("App\Models\Meja", "id_meja", "id");
    }
}
