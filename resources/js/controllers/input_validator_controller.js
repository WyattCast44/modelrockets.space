import { Controller } from "stimulus";
import Axios from "axios";

export default class extends Controller {
    static targets = ["source", "error"];

    handle() {
        let fieldName = this.fieldName;
        let errorMessage = this.errorTarget;

        Axios.get(`${this.url}?${this.fieldName}=${this.sourceTarget.value}`)
            .then(response => {
                errorMessage.innerText = "";
                errorMessage.classList.add("hidden");
            })
            .catch(error => {
                errorMessage.innerText = JSON.parse(
                    error.request.response
                ).errors[fieldName];
                errorMessage.classList.remove("hidden");
            });
    }

    get url() {
        return this.data.get("url");
    }

    get fieldName() {
        return this.sourceTarget.getAttribute("name");
    }
}
