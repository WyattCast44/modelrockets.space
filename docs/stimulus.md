# Stimulus Components Docs

## Validates Input

This component progressively enhances input to provide front end validation. The validation is powered by Laravel's default validation component, the cool part about that, is the error messages come back just like they would from a full request.

**_Blade File_**

```html
<div
    data-controller="input-validator"
    data-input-validator-url="{{ route('api.validators.username') }}"
>
    <input
        type="text"
        data-target="input-validator.source"
        data-action="keyup->input-validator#handle"
        class="form-control mt-2 @error('username') is-invalid @enderror"
        name="username"
        value="{{ old('username') }}"
        required
        autocomplete="false"
        spellcheck="false"
        autofocus
    />
    <small
        data-target="input-validator.error"
        class="hidden text-red-400"
    ></small>
</div>
```

**_Routes_**

```php
Route::get('/validators/email', 'API\Validators\ValidateEmail')->name('api.validators.email');
Route::get('/validators/username', 'API\Validators\ValidateUsername')->name('api.validators.username');
```

**_Controllers_**

```php

namespace App\Http\Controllers\API\Validators;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValidateEmail extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }
}
```

## Click to Copy

```html
<div data-controller="click-to-copy">
    <input
        type="text"
        data-target="click-to-copy.source"
        data-action="focus->click-to-copy#focus"
        class="form-control m-0 form-control-lg bg-blue-100 italic text-sm rounded-r-none"
        value="{{ $user->path('show') }}"
        contenteditable="true"
    />

    <button
        data-action="click->click-to-copy#handle"
        data-target="click-to-copy.button"
        class="btn btn-primary px-3 py-2 bg-blue-400 hover:bg-blue-500 text-white rounded-l-none rounded-r hidden md:inline"
    >
        Copy
    </button>
</div>
```

## MultiFile Input

-   Uses the BS4 custom input as base.
-   Lists the selected files as pills below the input
-   Updates the text in the file picker to the count of files selected

```html
<div class="form-group" data-controller="multifile">
    <label for="attachments[]" class="text-lg text-gray-600">Attachments</label>

    <div class="custom-file">
        <input
            type="file"
            data-target="multifile.source"
            data-action="change->multifile#handle"
            class="custom-file-input"
            name="attachments[]"
            id="attachments"
            multiple
        />

        <label
            class="custom-file-label"
            for="attachments[]"
            data-target="multifile.text"
            >Choose file(s)</label
        >
    </div>

    <div class="-mx-2" data-target="multifile.listContainer">
        <li
            data-target="multifile.listTemplate"
            class="mx-2 mb-2 p-2 bg-gray-200 text-xs hidden border border-solid border-gray-300 rounded"
        ></li>
        <ul
            data-target="multifile.list"
            class="list-none flex my-4 flex-wrap"
        ></ul>
    </div>
</div>
```

![Example](https://github.com/wyattcast44/modelrockets.space/raw/master/docs/images/multifile.png "Example screenshot of multifile component")
