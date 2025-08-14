<?php

namespace App\Models;

use App\Traits\CleansTrixContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;
    use CleansTrixContent;

    protected $fillable = ['booking_text', 'directions_text'];
    protected array $trixFields = ['booking_text', 'directions_text'];

    /**
     * Mutator: When setting `image_path`, automatically store the file.
     */
    public function setImagePathAttribute($file)
    {
        if ($file instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['image_path'] = $file->store('contact', 'public');
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
