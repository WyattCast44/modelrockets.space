import { Controller } from "stimulus";
import axios from "axios";

export default class extends Controller {
    static targets = ["count", "form"];

    upvote(event) {
        event.preventDefault();

        let count = this.countTarget;
        let form = this.formTarget;
        let url = form.getAttribute("action");
        let data = new FormData(form);

        form.style.display = "none";
        count.innerText = Number(count.innerText) + 1;

        axios
            .post(url, data)
            .then(function(response) {})
            .catch(function(error) {
                form.submit();
            });
    }
}
