import { Controller } from "stimulus";
import { throws } from "assert";

export default class extends Controller {
    static targets = [
        "source",
        "text",
        "listContainer",
        "listTemplate",
        "list"
    ];

    handle() {
        this.wipeList();
        this.updateInputText();
        this.displayFileNames();
    }

    wipeList() {
        let list = this.getList;
        while (list.firstChild) {
            list.removeChild(list.firstChild);
        }
    }

    updateInputText() {
        let count = this.getFiles.length;
        this.textTarget.innerText = `You selected ${count} file(s).`;
    }

    displayFileNames() {
        let files = this.getFiles;
        let list = this.getList;
        let template = this.getListItemTemplate;

        files.forEach(file => {
            let item = template.cloneNode(true);
            item.innerText = file.name;
            item.classList.remove("hidden");
            list.appendChild(item);
        });
    }

    get getFiles() {
        return Array.from(this.sourceTarget.files);
    }

    get getListContainer() {
        return this.listContainerTarget;
    }

    get getListItemTemplate() {
        return this.listTemplateTarget;
    }

    get getList() {
        return this.listTarget;
    }
}
