window.Vue = require('vue');

export class VueEventWrapper {
    constructor() {
      this.vue = new Vue();
    }

    fire (event, data) {
      this.vue.$emit(event, data)
    }

    listen (event, callBack) {
      this.vue.$on(event, callBack)
    }

    unsubscribe (event) {
      this.vue.$off(event)
    }
}

const eventWrapper = new VueEventWrapper();

window.Event = eventWrapper;
