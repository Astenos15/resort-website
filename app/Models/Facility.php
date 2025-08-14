<?php

namespace App\Models;

use App\Traits\CleansTrixContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{

    use CleansTrixContent;
    /** @use HasFactory<\Database\Factories\FacilityFactory> */
    use HasFactory;


    protected $fillable = ['image', 'facilities_text'];
    protected array $trixFields = ['facilities_text'];
}
