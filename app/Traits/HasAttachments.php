<?php

namespace App\Traits;

use App\Attachment;

trait HasAttachments
{
    /**
     * Relationships
     */
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
