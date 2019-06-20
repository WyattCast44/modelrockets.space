import { Controller } from "stimulus";
import { timingSafeEqual } from "crypto";

export default class extends Controller {
    static targets = ["source", "button"];

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
}
