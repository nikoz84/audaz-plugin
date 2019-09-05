(function($) {
  "use strict";

  /**
   * All of the code for your public-facing JavaScript source
   * should reside in this file.
   *
   * Note: It has been assumed you will write jQuery code here, so the
   * $ function reference has been prepared for usage within the scope
   * of this function.
   *
   * This enables you to define handlers, for when the DOM is ready:
   *
   * $(function() {
   *
   * });
   *
   * When the window is loaded:
   *
   * $( window ).load(function() {
   *
   * });
   *
   *<div id="app">
   *	<input class="form-control" type="text" v-model="search" placeholder="Ex: Reforma" @click="buscar()">
   *	<ul v-if="servicos">
   *		<li v-for="(servico,i) in servicos" @click="selectOption(servico.title)">{{servico.title}}</li> 
   *	</ul>
   *</div>
   *
   * Ideally, it is not considered best practise to attach more than a
   * single DOM-ready or window-load handler for a particular page.
   * Although scripts in the WordPress core, Plugins and Themes may be
   * practising this, we should strive to set a better example in our own work.
   */
  
  $( window ).load(function() {
    const app = new Vue({
      el: "#app",
      data: {
		search: "",
		servicos: [],
		tipoProjetos: {},
		tipoEmprendimentos: {}
	  },
	  methods: {
        buscar() {
		  let self = this;
          $.ajax('/wp-json/api-v1/orcamento').then(resp => {
			 self.servicos = resp.servicos;
			 self.tipoProjetos = resp.tipo_projetos; 
			 self.tipoEmprendimentos = resp.tipo_emprendimentos;
		  })
		},
		selectOption(title){
			this.search = title;
			this.servicos = [];
		}
	  }
	});

	//app.hi();
  });
})(jQuery);


