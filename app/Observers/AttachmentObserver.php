<?php

namespace App\Observers;

use App\Attachment;
use JD\Cloudder\Facades\Cloudder;

class AttachmentObserver
{
    public function deleting(Attachment $attachment)
    {
        Cloudder::delete($attachment->vendor_id);
    }
}
