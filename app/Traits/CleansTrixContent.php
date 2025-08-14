<?php

namespace App\Traits;

use Mews\Purifier\Facades\Purifier;

trait CleansTrixContent
{
    /**
     * Automatically clean Trix content before saving the model.
     */
    public static function bootCleansTrixContent()
    {
        static::saving(function ($model) {
            foreach ($model->getTrixFields() as $field) {
                if (!empty($model->{$field})) {
                    // Clean using our custom config
                    $model->{$field} = Purifier::clean($model->{$field}, 'trix_ultra_safe_video');
                }
            }
        });
    }

    /**
     * Get the fields that should be cleaned.
     *
     * @return array
     */
    protected function getTrixFields(): array
    {
        // Use the $trixFields property if set in the model
        return property_exists($this, 'trixFields') ? $this->trixFields : [];
    }
}
