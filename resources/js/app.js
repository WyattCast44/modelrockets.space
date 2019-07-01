require("./bootstrap");

/**
 * VueJS
 */
// window.Vue = require("vue");

// const files = require.context("./", true, /\.vue$/i);
// files.keys().map(key =>
//     Vue.component(
//         key
//             .split("/")
//             .pop()
//             .split(".")[0],
//         files(key).default
//     )
// );

// const app = new Vue({
//     el: "#app"
// });

/**
 * Turbolinks
 */
let Turbolinks = require("turbolinks");

Turbolinks.start();

/**
 * StimulusJS
 */
import { Application } from "stimulus";
import { definitionsFromContext } from "stimulus/webpack-helpers";

const application = Application.start();
const context = require.context("./controllers", true, /\.js$/);
application.load(definitionsFromContext(context));

/**
 * Trix
 */
//import Trix from "trix";
