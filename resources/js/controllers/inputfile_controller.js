import { Controller } from "stimulus";
import Axios from "axios";

export default class extends Controller {
    static targets = ["source", "listContainer", "listTemplate", "list"];

    handle() {
        this.wipeList();

        this.displayFileNames();

        let files = this.getFiles;

        files.forEach(file => {
            this.uploadFile(file);
        });
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

    wipeList() {
        let list = this.getList;
        while (list.firstChild) {
            list.removeChild(list.firstChild);
        }
    }

    uploadFile(file) {
        // var formData = new FormData();
        // formData.append("image", file);
        // Axios.post("/api/upload-file", formData, {
        //     headers: {
        //         "Content-Type": "multipart/form-data"
        //     }
        // })
        //     .then(function(response) {
        //         console.log(response);
        //     })
        //     .catch(function(error) {
        //         console.log(error);
        //     });
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
