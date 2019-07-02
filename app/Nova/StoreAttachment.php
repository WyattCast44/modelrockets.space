<?php

namespace App\Nova;

use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class StoreAttachment
{
    /**
     * Store the incoming file upload.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return array
     */
    public function __invoke(Request $request, $model)
    {
        Cloudder::upload($request->attachment->getrealPath(), null);

        return [
            'vendor_id' => Cloudder::getPublicId(),
            'path' => Cloudder::secureShow(Cloudder::getPublicId()),
            'available' => true,
        ];
    }
}
