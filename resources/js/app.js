/**
 * Alpine JS
 * @link https://github.com/alpinejs/alpine
 */
import 'alpinejs'

/**
 * Turbolinks
 * @link https://github.com/turbolinks/turbolinks
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
 * LightBox
 */
import GLightbox from 'glightbox'

const lightbox = GLightbox();