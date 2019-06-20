import { Controller } from "stimulus";
import axios from "axios";

export default class extends Controller {
    static targets = ["count", "form"];

    connect() {
        console.log("Connected!");
    }

    upvote(event) {
        event.preventDefault();

        let count = this.countTarget;
        let form = this.formTarget;
        let url = form.getAttribute("action");
        let data = new FormData(form);

        axios
            .post(url, data)
            .then(function(response) {
                count.innerText = Number(count.innerText) + 1;
            })
            .catch(function(error) {
                form.submit();
            });
    }
}
