import { Controller } from "stimulus";
import { throws } from "assert";

export default class extends Controller {
    static targets = ["select"];

    handle(event) {
        let queryParam = this.selectTarget.value;

        this.navigate("?q=" + queryParam);
    }

    navigate(url) {
        console.log(`hitting: {url}`);
        window.location.href = url;
    }
}
