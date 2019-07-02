<?php

namespace App\Observers;

use App\Attachment;
use JD\Cloudder\Facades\Cloudder;

class AttachmentObserver
{
    public function deleting(Attachment $attachment)
    {
        // Clean up any attachments on cloudinary...
        Cloudder::delete($attachment->vendor_id);
    }
}
