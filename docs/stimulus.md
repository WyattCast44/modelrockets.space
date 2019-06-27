# Stimulus Components Docs

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
