<template>
  <div class="row">
    <section class="col-sm-6">
    <!-- SERVICOS-->
    <select v-if="servicos" class="form-control" v-model="servico" @change="selectOption($event)">
      <option value="0">Escolha Um Serviço</option>
      <option v-for="(servico, i) in servicos" :value="`${servico.id}`" :key="i" v-text="servico.title"></option>
    </select>

    <p v-if="hasQuestion"> {{ question }} 
        <strong 
          class="text-danger" 
          style="cursor:pointer;" 
          @click="response(1)">
          NÃO
        </strong> |
        <strong 
          class="text-info" 
          style="cursor:pointer;color:#31708f !important;" 
          @click="response(0)">
          SIM
        </strong> 
    </p>
<!-- TIPO EMPRENDIMENTO
    <div v-if="!showDadosPessoais">
    
     
    <div v-show="servico">
      <p>Escolha o tipo de Projeto</p>
      <ul class="list-unstyled list-inline">
        <li v-for='(projeto, i) in tiposProjetos' :key="`c-${i}`" @click="selectProjeto(projeto, false)">
          <a class="label label-default" style="cursor:pointer;" v-text="projeto.name"></a>
        </li>
      </ul>
      <Childs v-if="showChilds" :childs="childs"></Childs>
      <p v-if="tipoProjeto">Possui Projeto? 
        <strong class="text-danger" style="cursor:pointer;" @click="response('NÃO')">NÃO</strong> |
        <strong class="text-info" style="cursor:pointer;color:#31708f !important;" @click="response('SIM')">SIM</strong> 
      </p>
      <div v-show="possuiProjeto == 'SIM'">
        <input type="file" id="has-project-file" @change="onFileChange($event)" />
        <label for="has-project-file">Arquivo em formato excel</label>
      </div>
      <p v-if="possuiProjeto == 'NÃO'">Deseja contratar conosco? 
        <strong class="text-info" style="cursor:pointer;color:#31708f !important;" @click="contratar('SIM')">SIM</strong> | 
        <strong class="text-danger" style="cursor:pointer;" @click="contratar('NÃO')">NÃO</strong>
      </p>
    </div>
    <div v-if="desejaContratar == 'SIM'">
      <p>Escolha o tipo de Emprendimento</p>
      <ul class="list-unstyled list-inline">
        <li v-for='(emprendimento, i) in tiposEmprendimentos' :key="`c-${i}`" @click="selectEmprendimento(emprendimento)">
          <a class="label label-default" style="cursor:pointer;" v-text="emprendimento.name"></a>
        </li>
      </ul>
      <div v-if="childsEmp">
        <ul class="list-unstyled list-inline">
          <li v-for="(echild, e) in childsEmp" :key="`echild-${e}`" @click="addEmpChild(echild, $event)">
            <a class="label label-primary" style="cursor:pointer;" v-text="echild"></a>
          </li>
        </ul>
        
      </div>
    </div>
    </div>
    <div v-if="showDadosPessoais">
      <p>Preencha Seus dados Pessoais</p><br>
      Nome: <input class="form-control" type="text" name="name" v-model="nome"><br>
      E-mail: <input class="form-control" type="text" name="email" v-model="email"><br>
      Telefone: <input class="form-control" pattern="\(\d{2}\)\d{5}-\d{4}" type="text" name="telefone" v-model="telefone"><br>
    </div>

    <button v-if="nome && email && telefone" class="btn btn-success" type="submit" @click.prevent="enviar()"> Enviar </button>
   
    </section>
    <section class="col-sm-6 border" >
      <div class="row" style="padding-left:5px;"> 
        <p v-show="servico"><strong>Serviço:</strong> {{servico}} </p>
        <p v-show="tipoProjeto"><strong>Tipo de Projeto:</strong> {{tipoProjeto}}</p>
        <p v-show="possuiProjeto"><strong>Possui Projeto:</strong> {{possuiProjeto}} </p>
        <p v-show="desejaContratar"><strong>Deseja Contratar Conosco:</strong> {{desejaContratar}} </p>
        <p v-show="tipoEmprendimento"><strong>Tipo Emprendimento:</strong> {{tipoEmprendimento}} </p>
        <p v-show="showDadosPessoais">Dados Pessoais</p>
        <p v-show="nome"><strong>Nome:</strong> {{nome}} </p>
        <p v-show="email"><strong>E-mail:</strong> {{email}}</p>
        <p v-show="telefone"><strong>Telefone:</strong>{{ telefone }}</p> 
      </div>
      -->
    </section>
  </div>
</template>

<script>
//import Childs from "./Childs.vue";

export default {
  name: "Orcamento",
  //components: { Childs },
  data() {
    return {
      servico: "0",
      possuiProjeto: "",
      tipoEmprendimento: "",
      tipoProjeto: "",
      arquivoProjeto: "",
      desejaContratar: "",
      servicos: [],
      tiposProjetos: [],
      tiposEmprendimentos: [],
      showChilds: false,
      childs: [],
      childsEmp: [],
      fim: false,
      nome: "",
      email: "",
      telefone: "",
      showDadosPessoais: false,
      hasQuestion: false,
      question: ""
    };
  },
  mounted() {
    this.buscar();
  },
  methods: {
    buscar() {
      let self = this;
      this.$axios.get("orcamento").then(resp => {
        self.servicos = resp.data.servicos;
        self.tiposProjetos = resp.data.tipo_projeto;
        self.tiposEmprendimentos = resp.data.tipo_emprendimentos;
      });
    },
    makeQuestion(){

    },
    selectOption(e) {
      let el = e.target;
      //el.classList.add("hidden");
      let id = el.value;
      //console.log(id);
      switch (true) {
        case id == 1:
          
          console.log(id)
          break;
        case id == 2:
          console.log(id)
          break;
        case id == 3:
          console.log(id)
          break; 
        case id == 4:
          console.log(id)
          break;
        case id == 5:
          console.log(id)
          break;
        case id == 6:
          console.log(id)
          break;
        case id == 7:
          console.log(id)
          break; 
        default:
          break;
      }
    },
    selectEmprendimento(emp) {
      if (emp.types.length) {
        this.showChilds = true;
        this.childsEmp = emp.types;
      } else {
        this.childsEmp = [];
        this.showDadosPessoais = true;
      }
      this.tipoEmprendimento = emp.name;
    },
    selectProjeto(projeto, isChild) {
      if (projeto.types.length > 0 && isChild == false) {
        this.showChilds = true;
        this.childs = projeto.types;
      } else {
        this.childs = [];
      }
      this.tipoProjeto = projeto.name;
    },
    response(resp) {
      this.possuiProjeto = resp;
    },
    contratar(resp) {
      if (resp == "SIM") {
        this.desejaContratar = resp;
      } else {
        window.location.href = "/";
      }
    },
    onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;
      let el = e.target;
      if (!files.length) {
        e.preventDefault();
        alert("Escolha um Arquivo");
        return;
      }
      let file = files[0];
      let size = file.size / 1024 / 1024;
      if (size > 2) {
        e.preventDefault();
        alert("Tamanho máximo do arquivo de 2MB");
        return;
      }
      let ext = this.getExtension(file.name);

      if (ext != "xls" && ext != "xlsx") {
        e.preventDefault();
        alert("Formato não permitido, formato permitidos .xls ou .xlsx");
        return;
      }

      this.arquivoProjeto = file;
      el.classList.add("hidden");
      this.showDadosPessoais = true;
    },
    addEmpChild(child, e) {
      this.tipoEmprendimento = `${this.tipoEmprendimento} - ${child}`;
      e.target.parentNode.classList.add("hidden");
      this.showDadosPessoais = true;
    },
    hasChild(child) {
      this.tipoProjeto = `${this.tipoProjeto} - ${child}`;
    },
    getExtension(filename) {
      var parts = filename.split(".");
      return parts[parts.length - 1];
    },
    enviar() {
      let formData = new FormData();
      formData.append('servico', this.servico);
      formData.append('tipo_emprendimento', this.tipoEmprendimento);
      formData.append('possui_projeto', this.possuiProjeto);
      formData.append('arquivo_projeto', this.arquivoProjeto);
      formData.append('tipo_projeto', this.tipoProjeto);
      formData.append('deseja_contratar', this.desejaContratar);
      formData.append('nome', this.nome);
      formData.append('email', this.email);
      formData.append('telefone', this.telefone);
      
      this.$axios.post("orcamento", formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          }).then(resp => {
        if(resp.data && resp.data.success){
          alert(resp.data.message); 
          setTimeout(()=>{
            window.location.href('/');   
          },400);
        } else {
          alert('Desculpe, não foi possível enviar o orçamento');
        }
      });
    }
  }
};
</script>
<style>
.border{
  border-left-color: darkgray;
}  
</style>
