import Vue from "vue";
import App from "./App.vue";
import axios from "axios";

// http://audaz.des/wp-json/api-v1/
let instance = axios.create({
  baseURL: "http://audazengenharia.com.br/wp-json/api-v1/"
});
Vue.use(instance);
Vue.config.productionTip = false;

Vue.prototype.$axios = instance;

new Vue({
  render: h => h(App)
}).$mount("#app");
