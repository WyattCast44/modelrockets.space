<?php

namespace App\Http\Livewire\Users\Gallery;

use App\User;
use App\Attachment;
use Livewire\Component;
use Livewire\WithFileUploads;
use JD\Cloudder\Facades\Cloudder;

class Upload extends Component
{
    use WithFileUploads;

    public $photos = [];

    public function updatedPhotos()
    {
        $this->validate([
            'photos.*' => 'image|max:4096', 
        ]);
    }

    public function save()
    {
        $this->validate([
            'photos.*' => 'image|max:4096',
        ]);

        // foreach ($this->photos as $photo) {
        //     $photo->storePublicly('photos', 's3');
        // }

        foreach ($this->photos as $photo) {
            
            Cloudder::upload($photo->getRealPath(), null);

            Attachment::create([
                'user_id' => auth()->id(),
                'attachable_id' => auth()->id(),
                'attachable_type' => User::class,
                'filename' => '',
                'vendor_id' => Cloudder::getPublicId(),
                'path' => Cloudder::secureShow(Cloudder::getPublicId()),
                'available' => true,
            ]);

        }
    }

    public function render()
    {
        return view('livewire.users.gallery.upload');
    }
}
