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
   
   *
   * Ideally, it is not considered best practise to attach more than a
   * single DOM-ready or window-load handler for a particular page.
   * Although scripts in the WordPress core, Plugins and Themes may be
   * practising this, we should strive to set a better example in our own work.
   */

  $(window).load(function() {
    const app = new Vue({
      el: "#app",
      data: {
        message: "DIGITE O SERVIÇO QUE ESTÁ PROCURANDO",
        hasProject: null,
        search: "",
        showEmprendimentos: false,
        showEmprendimentosTypes: false,
        tipoEmprendimento: "",
        tipoProjeto: "",
        servicos: [],
        projetos: {},
        emprendimentos: {}
      },
      methods: {
        buscar() {
          let self = this;
          $.ajax("/wp-json/api-v1/orcamento").then(resp => {
            self.servicos = resp.servicos;
            self.projetos = resp.tipo_projetos;
            self.emprendimentos = resp.tipo_emprendimentos;
          });
        },
        selectOption(service) {
          this.search = service.title;
          this.servicos = [];

          switch (service.id) {
            case 4:
              this.message = "Você está com sua conta da luz?";

              break;
            default:
              this.message = "Você possui projeto?";

              break;
          }
        },
        selectEmprendimento(data) {
          console.log(data);
        },
        hasProject() {
          //
        },
        sendEmail() {
          let data = {
            servico: this.search,
            resposta: this.response
          };
          console.log(data);
        }
      }
    });

    //app.hi();
  });
})(jQuery);
