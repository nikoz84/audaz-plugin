import Vue from "vue";
import App from "./App.vue";
import axios from "axios";

let instance = axios.create({
  baseURL: "http://www.audaz-construct.des/wp-json/api-v1/"
});
Vue.use(instance);
Vue.config.productionTip = false;

Vue.prototype.$axios = instance;

new Vue({
  render: h => h(App)
}).$mount("#app");
