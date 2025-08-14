import './bootstrap';
import '../css/app.css'
import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css";

import Alpine from 'alpinejs'
import intersect from '@alpinejs/intersect'

Alpine.plugin(intersect)

window.Alpine = Alpine

Alpine.start()
