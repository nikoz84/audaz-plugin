<template>
  <div class="row" style="word-break: break-word;">
    <section class="col-sm-6">
    <div v-show="!showDadosPessoais">  
      <!-- SERVICOS-->
      <select v-if="servicos" class="form-control" v-model="servico" @change="selectOption($event)">
        <option value="0">Escolha Um Serviço</option>''
        <option v-for="(servico, i) in servicos" :value="`${servico.id}`" :id="`ser-${servico.id}`" :key="i" v-text="servico.title"></option>
      </select>
      <!-- PROJETO -->
      <div v-if="hasQuestion" style="padding-top:10px;">
        <p> {{ question }} 
        <toggle-button 
          :value="true"
            color="#82C7EB"
            :sync="false"
            v-model="possuiProjeto"
          @change="onChangeHasProject" 
          :labels="{checked: 'Sim', unchecked: 'Não'}" 
          style="margin-left: 20px" />
        </p>
        <div v-show="possuiProjeto == true" >
          <input type="file" id="has-project-file" @change="onFileChange($event, 'projeto')" />
          <label for="has-project-file">Envie o projeto em formato excel</label>
        </div>
      </div>
      <!-- DESEJA CONTRATAR -->
      <div v-show="showDesejaContratar">
        <p> Deseja contratar o serviço de projeto conosco? 
          <toggle-button 
          :value="true"
            color="#82C7EB"
            :sync="false"
            v-model="desejaContratar"
          @change="onChangeDesejaContratar" 
          :labels="{checked: 'Sim', unchecked: 'Não'}" 
          style="margin-left: 20px" />
        </p>
      </div>  
      <!-- CONTA -->
      <div v-if="hasConta" style="padding-top:10px;">
        <p> {{ questionConta }} 
        <toggle-button 
          :value="false"
            color="#82C7EB"
            :sync="true"
            v-model="possuiConta"
          @change="onChangeHasConta" 
          :labels="{checked: 'Sim', unchecked: 'Não'}" 
          style="margin-left: 20px" />
        </p>
        <div v-show="possuiConta == true">
          <input type="file" id="has-project-file" @change="onFileChange($event, 'conta')" />
          <label for="has-project-file">Envie sua conta de energia</label>
        </div>
      </div>
      <!-- TIPO PROJETO -->
      <div v-show="showTipoProjeto">
        <p>Escolha o tipo de Projeto</p>
        <ul class="list-unstyled list-inline">
          <li v-for='(projeto, i) in tiposProjetos' :key="`c-${i}`" @click="selectProjeto(projeto, false)">
            <a class="label label-default" style="cursor:pointer;" v-text="projeto.name"></a>
          </li>
        </ul>
        <Childs v-if="showChilds" :childs="childs"></Childs>
      </div>
      
      <!-- TIPO EMPRENDIMENTO -->
      <div v-if="showTipoEmprendimentos" id="emprendimentos" style="padding-top:10px;">
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
    <div v-if="showDadosPessoais" style="padding-top:10px;">
      <p>Preencha Seus dados Pessoais</p><br>
      Nome: <input class="form-control" type="text" name="name" v-model="nome"><br>
      E-mail: <input class="form-control" type="text" name="email" v-model="email"><br>
      Telefone: <input class="form-control" pattern="\(\d{2}\)\d{5}-\d{4}" type="text" name="telefone" v-model="telefone"><br>
    </div>
    <button v-if="nome && email && telefone" class="btn btn-success btn-sm" type="submit" @click.prevent="enviar()"> Enviar </button>
  </section>
    <section class="col-sm-6 border" >
      <div class="row" style="padding-left:5px;"> 
        <p v-show="servicoName"><strong>Serviço:</strong> {{servicoName}} </p>
        <p v-show="tipoProjeto"><strong>Tipo de Projeto:</strong> {{tipoProjeto}}</p>
        <p v-show="possuiProjeto"><strong>Possui Projeto:</strong> {{possuiProjeto ? 'Sim' : 'Não'}} </p>
        <p v-show="desejaContratar"><strong>Deseja Contratar Conosco:</strong> {{desejaContratar ? 'Sim' : 'Não'}} </p>
        <p v-show="tipoEmprendimento"><strong>Tipo Emprendimento:</strong> {{tipoEmprendimento}} </p>
        <p v-show="showDadosPessoais">Dados Pessoais</p>
        <p v-show="nome"><strong>Nome:</strong> {{nome}} </p>
        <p v-show="email"><strong>E-mail:</strong> {{email}}</p>
        <p v-show="telefone"><strong>Telefone:</strong>{{ telefone }}</p> 
      </div>
      
    </section>
  </div>
</template>

<script>
import Childs from "./Childs.vue";
import { ToggleButton } from "vue-js-toggle-button";

export default {
  name: "Orcamento",
  components: { ToggleButton, Childs },
  data() {
    return {
      servico: "0",
      servicoName: "",
      possuiProjeto: false,
      tipoEmprendimento: "",
      tipoProjeto: "",
      arquivoProjeto: "",
      desejaContratar: false,
      servicos: [],
      tiposProjetos: [],
      tiposEmprendimentos: [],
      showChilds: false,
      showTipoEmprendimentos: false,
      showDesejaContratar: false,
      showTipoProjeto: false,
      childs: [],
      childsEmp: [],
      fim: false,
      nome: "",
      email: "",
      telefone: "",
      showDadosPessoais: false,
      hasQuestion: false,
      question: "",
      hasConta: false,
      questionConta: "",
      possuiConta: false,
      arquivoConta: ""
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
    selectOption(e) {
      let el = e.target;
      let id = el.value;
      let option = document.getElementById(`ser-${id}`);
      this.servicoName = option.innerHTML;
      this.arquivoProjeto = "";
      this.arquivoConta = "";
      this.possuiProjeto = false;
      this.desejaContratar = false;
      this.showTipoProjeto = false;

      switch (true) {
        case id == 1:
          /** construção */
          this.hasQuestion = true;
          this.hasConta = false;
          this.showDadosPessoais = false;
          this.showDesejaContratar = true;
          this.nome = "";
          this.email = "";
          this.telefone = "";
          this.question = "Possui projeto?";
          break;
        case id == 2:
          /** reforma */
          this.hasQuestion = true;
          this.hasConta = false;
          this.showDadosPessoais = false;
          this.showDesejaContratar = true;
          this.nome = "";
          this.email = "";
          this.telefone = "";
          this.question = "Possui projeto?";
          break;
        case id == 3:
          /** projetos */
          this.hasQuestion = true;
          this.hasConta = false;
          this.showDadosPessoais = false;
          this.nome = "";
          this.email = "";
          this.telefone = "";
          this.question = "Possui projeto?";
          break;
        case id == 4:
          /** paneil solar */
          this.hasQuestion = false;
          this.hasConta = true;
          this.showDadosPessoais = false;
          this.nome = "";
          this.email = "";
          this.telefone = "";
          this.questionConta = "Você está com sua conta de luz?";
          break;
        case id == 5:
          /** automação residencial */
          this.hasQuestion = true;
          this.hasConta = false;
          this.showTipoEmprendimentos = false;
          this.showDadosPessoais = false;
          this.nome = "";
          this.email = "";
          this.telefone = "";
          this.question = "Possui projeto?";
          break;
        case id == 6:
          /** inspeção predial */
          this.hasQuestion = false;
          this.hasConta = false;
          this.showTipoEmprendimentos = true;
          this.showDesejaContratar = false;
          this.showDadosPessoais = true;
          this.nome = "";
          this.email = "";
          this.telefone = "";
          break;
        case id == 7:
          /** orçamento planejamento */
          this.hasQuestion = true;
          this.hasConta = false;
          this.showDadosPessoais = false;
          this.showDesejaContratar = true;
          this.nome = "";
          this.email = "";
          this.telefone = "";
          this.question = "Possui projeto?";

          break;
        default:
          this.hasQuestion = false;
          this.hasConta = false;
          this.showDadosPessoais = false;
          this.showDesejaContratar = false;
          this.nome = "";
          this.email = "";
          this.telefone = "";
          this.question = "";
          break;
      }
    },
    onChangeHasProject() {
      if (this.possuiProjeto) {
        this.showDesejaContratar = false;
      } else {
        this.showDesejaContratar = true;
      }
    },
    onChangeHasConta() {
      if (!this.possuiConta) {
        this.showDadosPessoais = false;
        this.nome = "";
        this.email = "";
        this.telefone = "";
      }
      this.arquivoConta = "";
    },
    onChangeDesejaContratar() {
      if (this.desejaContratar) {
        this.showTipoEmprendimentos = true;
        this.showTipoProjeto = true;
      } else {
        this.showTipoEmprendimentos = false;
        this.showTipoProjeto = false;
      }
    },
    selectEmprendimento(emp) {
      if (emp.types.length) {
        this.showChilds = true;
        this.childsEmp = emp.types;
      } else {
        this.showTipoEmprendimentos = false;
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
    onFileChange(e, type) {
      var files = e.target.files || e.dataTransfer.files;

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
      let resp = this.fileType(ext, type);
      if (!resp.success) {
        e.preventDefault();
        alert(resp.message);
      }
      if (type === "projeto") {
        this.arquivoProjeto = file;
        this.showDadosPessoais = true;
      } else if (type === "conta") {
        this.arquivoConta = file;
        this.showDadosPessoais = true;
      }
    },
    fileType(ext, type) {
      if (type === "projeto") {
        if (ext != "xls" && ext != "xlsx") {
          return {
            success: false,
            message:
              "Formato não permitido, arquivos .xls e .xlsx são permitidos"
          };
        } else {
          return {
            success: true,
            message: ""
          };
        }
      } else if (type === "conta") {
        if (ext != "pdf") {
          return {
            success: false,
            message: "Formato não permitido, arquivos .pdf são permitidos"
          };
        } else {
          return {
            success: true,
            message: ""
          };
        }
      }
    },
    addEmpChild(child) {
      this.tipoEmprendimento = `${this.tipoEmprendimento} - ${child}`;
      this.showTipoEmprendimentos = false;
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
      let projeto = this.possuiProjeto ? "Sim" : "Não";
      let desejaContratar = this.desejaContratar ? "Sim" : "Não";
      let file = this.arquivoProjeto ? this.arquivoProjeto : this.arquivoConta;

      formData.append("servico", this.servicoName);
      formData.append("tipo_emprendimento", this.tipoEmprendimento);
      formData.append("possui_projeto", projeto);
      formData.append("file", file);
      formData.append("tipo_projeto", this.tipoProjeto);
      formData.append("deseja_contratar", desejaContratar);
      formData.append("nome", this.nome);
      formData.append("email", this.email);
      formData.append("telefone", this.telefone);

      this.$axios
        .post("orcamento", formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(resp => {
          if (resp.data && resp.data.success) {
            alert(resp.data.message);
            window.location.href("/");
          } else {
            alert("Desculpe, não foi possível enviar o orçamento");
            window.location.href("/");
          }
        });
    }
  }
};
</script>
<style>
.border {
  border-left-color: darkgray;
}
</style>
