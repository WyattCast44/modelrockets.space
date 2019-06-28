import { Controller } from "stimulus";

export default class extends Controller {
    static targets = ["submit"];

    handle(event) {
        event.preventDefault();
        this.submitForm();
    }

    submitForm() {
        this.submitTarget.innerText = this.data.has("loading")
            ? this.data.get("loading")
            : "Processing...";

        this.submitTarget.disabled = true;
        this.submitTarget.style.cursor = "wait";
        this.element.submit();
    }

    validateField(event) {
        if (event.target.getAttribute("data-form-ignore") == "true") {
            return;
        }

        axios({
            method: this.element.getAttribute("method"),
            url: this.element.getAttribute("action"),
            data: { [event.target.getAttribute("name")]: event.target.value }
        }).catch(error => {
            if (
                error.response.data.errors[event.target.getAttribute("name")] !=
                undefined
            ) {
                this.showFieldError(
                    event.target,
                    error.response.data.errors[
                        event.target.getAttribute("name")
                    ]
                );
            } else {
                this.removeFieldError(event.target);
            }
        });
    }

    showFieldError(el, content) {
        el.classList.add("is-invalid");
        let error_msg = document.createElement("span");
        error_msg.innerText = content;
        error_msg.classList.add("font-semibold", "invalid-feedback");
        el.parentNode.insertBefore(error_msg, el.nextSibling);
    }

    removeFieldError(el) {
        el.classList.remove("is-invalid");
        el.parentNode.removeChild(el.nextSibling);
    }
}
