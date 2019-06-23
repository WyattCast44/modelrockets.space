import { Controller } from "stimulus";

export default class extends Controller {
    static targets = ["select"];

    handle(event) {
        let destination = this.selectTarget.value;
        this.navigate(destination);
    }

    navigate(destination) {
        window.location.href = destination;
    }
}
