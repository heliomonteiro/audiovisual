<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    protected $fillable = [
        'nome', 'tipo', 'descricao', 'cidade_id', 'lat', 'lng',
    ];

    public function cidade()
    {
        return $this->belongsTo(City::class);
    }
}
