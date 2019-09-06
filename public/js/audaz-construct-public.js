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
        message: "QUAL SERVIÇO ESTÁ PROCURANDO?",
        hasProject: "",
        search: "",
        projectFile: "",
        showEmprendimentos: false,
        showEmprendimentosTypes: false,
        tipoEmprendimento: "",
        tipoProjeto: "",
        servicos: [],
        projetos: {},
        emprendimentos: {}
      },
      mounted() {
        this.buscar();
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
        selectOption(event) {
          //this.search = service.title;
          //this.servicos = [];
          let el = event.target;
          el.classList.add("hidden");
          let id = el.id;

          switch (id) {
            case 4:
              this.message = "Você está com sua conta da luz?";
              break;
            default:
              this.message = "Você possui projeto?";
              let project = document.getElementById("has-project");
              project.classList.remove("hidden");
              break;
          }
        },
        hiddenHasProject(event) {
          let el = event.target;
          if (el.value == "Sim") {
            this.message = "Envie seu projeto";
          } else {
            this.message = "Quer contratar o projeto conosco?";
          }

          console.log(el.parentNode);
        },
        selectEmprendimento(data) {
          console.log(data);
        },
        sendEmail() {
          let data = {
            servico: this.search,
            resposta: this.response,
            possuiProjeto: this.hasProject,
            arquivoProjeto: this.projectFile
          };
          console.log(data);
        }
      }
    });

    Vue.component("question", {
      props: ["title"],
      template: "<h3>{{ title }}</h3>"
    });
  });
})(jQuery);
