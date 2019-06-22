import { Controller } from "stimulus";

export default class extends Controller {
    static targets = ["select"];

    connect() {
        console.log(
            "Connected to Select Nav!",
            this.selectTarget,
            this.navOptions
        );
    }

    handle(event) {
        this.navigate("/members");
    }

    get navOptions() {
        return this.selectTarget.options;
    }

    navigate(url) {
        console.log(`hitting: {url}`);
        window.location.href = url;
    }
}
