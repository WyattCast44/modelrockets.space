import { Controller } from "stimulus";

export default class extends Controller {
    static targets = ["source", "button"];

    connect() {
        if (!document.queryCommandSupported("copy")) {
            this.buttonTarget.classList.add("hidden");
            this.sourceTarget.removeAttribute("readonly");
            this.sourceTarget.setAttribute("readonly", false);
        }
    }

    handle() {
        this.sourceTarget.select();

        document.execCommand("copy");

        this.setButtonText("Copied!");

        this.resetButtonText();
    }

    setButtonText(text) {
        this.buttonTarget.innerText = text;
    }

    resetButtonText() {
        setInterval(() => {
            this.setButtonText("Copy");
        }, 3500);
    }

    focus() {
        this.sourceTarget.select();
        document.execCommand("copy");
    }
}
