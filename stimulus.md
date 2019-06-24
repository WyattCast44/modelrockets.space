# Stimulus Components Docs

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
