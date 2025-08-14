<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['image_path'];

    /**
     * Mutator: When setting `image_path`, automatically store the file.
     */
    public function setImagePathAttribute($file)
    {
        if ($file instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['image_path'] = $file->store('gallery', 'public');
        } else {
            $this->attributes['image_path'] = $file; // In case you pass a string path directly
        }
    }

    /**
     * Accessor: When getting `image_path`, return full public URL.
     */
    public function getImagePathAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
