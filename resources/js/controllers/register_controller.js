import { Controller } from "stimulus";
import axios from "axios";

export default class extends Controller {
    static targets = ["username", "errorMessage"];

    checkUniqueUsername() {
        let url =
            "/api/users/usernames/check?username=" + this.usernameTarget.value;
        let errorMessage = this.errorMessageTarget;

        axios
            .get(url)
            .then(function(response) {
                // Unique username
                errorMessage.innerText = "Username is available";
                errorMessage.classList.add("hidden");
            })
            .catch(function(error) {
                // Problem with username
                errorMessage.innerText = JSON.parse(
                    error.request.response
                ).errors.username[0];
                errorMessage.classList.remove("hidden");
            });
    }
}
