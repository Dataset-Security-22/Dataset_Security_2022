<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanitiaAcara extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_acara',
        'id_pengurus',
        'id_ketpanitia'
    ];


    public function acara()
    {
        return $this->belongsTo(Acara::class, 'id_acara', 'id');
    }

    public function pengurus()
    {
        return $this->belongsTo(DataPengurus::class, 'id_pengurus', 'id');
    }

    public function ketpanitia()
    {
        return $this->belongsTo(KeteranganPanitia::class, 'id_ketpanitia', 'id');
    }
}
