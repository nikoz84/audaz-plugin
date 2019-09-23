<template>
    <div>
        <ul class="list-unstyled"  >
            <li v-for="(item, i) in childs" :key="i" @click="selectChild(item, $event)">
                <a class="label label-primary" >{{item}} </a>
            </li>
        </ul>
         
    </div>
</template>
<script>
export default {
  name: "Childs",
  props: ["childs"],
  methods: {
    selectChild(item, e) {
      this.$parent.hasChild(item);
      let el = e.target;
      el.parentNode.classList.add("hidden");
      this.$parent.childs = [];
    }
  }
};
</script>
<style>
a.label {
  padding: 5px;
  margin-bottom: 2px;
  border-radius: 0px;
}
</style>
