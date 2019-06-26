import { Controller } from "stimulus";

export default class extends Controller {
    static targets = [
        "form",
        "submit",
        "fieldsContainer",
        "workingMessage",
        "attachments"
    ];

    handle(event) {
        if (!this.hasAttachments()) {
            return;
        }

        event.preventDefault();
        this.hideSubmitButton();
        this.hideFormFields();
        this.showWorkingMessage();

        this.processForm();
    }

    hasAttachments() {
        if (
            this.attachmentsTarget &&
            this.attachmentsTarget.files.length != 0
        ) {
            return true;
        }

        return false;
    }

    hideSubmitButton() {
        this.submitTarget.disabled = true;
        this.submitTarget.classList.add("hidden");
        this.submitTarget.innerText = "Submitting";
        this.submitTarget.classList.add("cursor-wait");
    }

    hideFormFields() {
        this.fieldsContainerTarget.classList.add("hidden");
    }

    showWorkingMessage() {
        this.workingMessageTarget.classList.remove("hidden");
    }

    processForm() {
        let form = this.formTarget;
        let data = new FormData(form);
        let status = form.submit();
    }
}
