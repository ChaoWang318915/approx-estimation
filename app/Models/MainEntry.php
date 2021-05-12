<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainEntry extends Model
{
    use HasFactory;
    protected $table = 'mainentry';
    protected $fillable = [
        'category',
        'description',
        'cost_m2',
        'unit_m2',
        'cost_sf',
        'unit_sf',
        'element_code'
    ];

    public function scopeFilter ($query, $filters) {

        if (isset($filters['category']) && $category = $filters['category']) {
            $query->where('category',$category);
        }
    }
}
