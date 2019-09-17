<template>
  <div id="app">
    <Orcamento/>
  </div>
</template>

<script>
import Orcamento from "./components/Orcamento.vue";

export default {
  name: "app",
  components: {
    Orcamento
  }
};
</script>
<style>
#app{
  font-size: 17px;
}
</style>