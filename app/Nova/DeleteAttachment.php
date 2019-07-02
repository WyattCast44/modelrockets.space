<?php

namespace App\Nova;

use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class DeleteAttachment
{
    /**
     * Delete the field's underlying file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return array
     */
    public function __invoke(Request $request, $model)
    {
        //        dd('here', $request, $model);

        Cloudder::destroyImages(collect($model->vendor_id));

        return [
            'vendor_id' => null,
            'path' => null,
            'available' => false,
        ];
    }
}
