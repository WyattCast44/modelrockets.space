import { Controller } from "stimulus";

export default class extends Controller {
    static targets = ["target"];

    handle() {
        window.print();
    }
}
