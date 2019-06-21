import { Controller } from "stimulus";
import axios from "axios";

export default class extends Controller {
    static targets = ["username", "usernameError", "email", "emailError"];

    validateUsername() {
        let url =
            "/api/validators/username?username=" + this.usernameTarget.value;
        let usernameError = this.usernameErrorTarget;

        axios
            .get(url)
            .then(function(response) {
                // Unique username
                usernameError.innerText = "Username is available";
                usernameError.classList.add("hidden");
            })
            .catch(function(error) {
                // Problem with username
                usernameError.innerText = JSON.parse(
                    error.request.response
                ).errors.username[0];
                usernameError.classList.remove("hidden");
            });
    }

    validateEmail() {
        let url = "/api/validators/email?email=" + this.emailTarget.value;
        let emailError = this.emailErrorTarget;

        axios
            .get(url)
            .then(function(response) {
                // Unique username
                emailError.innerText = "Email is available";
                emailError.classList.add("hidden");
            })
            .catch(function(error) {
                // Problem with username
                emailError.innerText = JSON.parse(
                    error.request.response
                ).errors.email[0];
                emailError.classList.remove("hidden");
            });
    }
}
