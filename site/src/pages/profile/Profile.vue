<template>
  <site-template>
    <span slot="leftMenu">
      <img
        src="../../assets/bemol.png"
        alt=""
        class="responsive-img"
      />
    </span>
    <span slot="main">
      <span v-if="registerTab === 0">
        <span class="center-align">
          <h5>Perfil - Dados para login</h5>
        </span>

        <div class="row">
          <div class="input-field col s12">
            <label for="user.email">E-mail</label>
            <input
              id="user.email"
              type="email"
              required
              maxlength="100"
              v-model="user.email"
              disabled
            />
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <label for="user.password">Senha *</label>
            <input
              id="user.password"
              type="password"
              required
              maxlength="100"
              v-model="user.password"
            />
          </div>

          <div class="input-field col s6">
            <label for="user.password_confirmation">Confirme sua senha *</label>
            <input
              id="user.password_confirmation"
              required
              maxlength="100"
              type="password"
              v-model="user.password_confirmation"
            />
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <router-link to="/login" class="btn orange waves-effect waves-light"
              >Já possuo conta</router-link
            >
          </div>
          <div class="input-field col s6 right-align">
            <button v-on:click="changeTab" class="btn waves-effect waves-light">
              Pŕoximo
            </button>
          </div>
        </div>
      </span>

      <span v-if="registerTab === 1">
        <span class="center-align">
          <h5>Atualizar - Dados Pessoais</h5>
        </span>

        <div class="row">
          <div class="input-field col s12">
            <label for="user.name">Nome *</label>
            <input
              id="user.name"
              type="text"
              required
              maxlength="100"
              v-model="user.name"
            />
          </div>
        </div>

        <span>
          <div class="row">
            <div class="input-field col s8">
              <input
                id="person.lastName"
                type="text"
                maxlength="50"
                v-model="person.lastName"
              />
              <label for="person.lastName">Sobrenome *</label>
            </div>

            <div class="input-dated col s4">
              <label for="person.birthday">Aniversário *</label>
              <input
                id="person.birthday"
                type="date"
                v-model="person.birthday"
                class="datepicker"
              />
            </div>
          </div>

          <div class="row">
            <br />
            <label class="col s4">
              <input
                name="genre"
                type="radio"
                value="F"
                v-model="person.genre"
              />
              <span>Feminino</span>
            </label>
            <label class="col s4">
              <input
                name="genre"
                type="radio"
                value="M"
                v-model="person.genre"
              />
              <span>Masculino</span>
            </label>
            <label class="col s4">
              <input
                name="genre"
                type="radio"
                value="O"
                v-model="person.genre"
              />
              <span>Outro</span>
            </label>
          </div>
          <br />
        </span>

        <div class="row">
          <div class="input-field col s6">
            <input
              type="number"
              id="person.cpf"
              required
              maxlength="20"
              v-model="person.cpf"
            />
            <label for="person.cpf">C.P.F. *</label>
          </div>

          <div class="input-field col s6">
            <input
              type="number"
              id="person.rg"
              maxlength="50"
              v-model="person.rg"
            />
            <label for="person.rg"> R.G. </label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <button
              v-on:click="registerTab -= 1"
              class="btn orange waves-effect waves-light"
            >
              Anterior
            </button>
          </div>
          <div class="input-field col s6 right-align">
            <button v-on:click="changeTab" class="btn waves-effect waves-light">
              Próximo
            </button>
          </div>
        </div>
      </span>

      <span v-if="registerTab === 2">
        <span class="center-align">
          <h5>Atualizar - Dados Endereço</h5>
        </span>

        <div class="row">
          <div class="input-field col s12">
            <input
              id="person.zip_code"
              type="text"
              required
              maxlength="10"
              mask
              v-model="person.zip_code"
              v-on:change="researchViaCep"
            />
            <label for="person.zip_code">C.E.P. *</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input
              id="person.address"
              type="text"
              required
              maxlength="100"
              v-model="person.address"
            />
            <label for="person.address">Endereço *</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s4">
            <input
              id="person.number"
              type="text"
              required
              maxlength="20"
              v-model="person.number"
            />
            <label for="person.number">Número *</label>
          </div>

          <div class="input-field col s8">
            <input
              id="person.neighborhood"
              type="text"
              maxlength="50"
              v-model="person.neighborhood"
            />
            <label for="person.neighborhood">Bairro</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input
              id="person.complement"
              type="text"
              maxlength="100"
              v-model="person.complement"
            />
            <label for="person.complement">Complemento</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s8">
            <input
              id="person.city"
              type="text"
              required
              maxlength="50"
              v-model="person.city"
            />
            <label for="person.city">Cidade *</label>
          </div>

          <div class="input-field col s4">
            <input
              id="person.state"
              type="text"
              required
              maxlength="2"
              v-model="person.state"
            />
            <label for="person.state">Estado *</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <input
              id="person.phone"
              type="number"
              maxlength="15"
              v-model="person.phone"
            />
            <label for="person.phone">Telefone</label>
          </div>

          <div class="input-field col s6">
            <input
              id="person.cell_phone"
              type="text"
              maxlength="15"
              v-model="person.cell_phone"
            />
            <label for="person.cell_phone">Celular</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <button
              v-on:click="registerTab -= 1"
              class="btn orange waves-effect waves-light"
            >
              Anterior
            </button>
          </div>
          <div class="input-field col s6 right-align">
            <button v-on:click="saveProfile" class="btn waves-effect waves-light">
              Atualizar
            </button>
          </div>
        </div>
      </span>
      <span>
        <div class="row">
          <label><b>* Campo obrigatório</b></label>
        </div>
      </span>
    </span>
  </site-template>
</template>

<script>
import SiteTemplate from "@/templates/SiteTemplate";

export default {
  name: "Profile",
  components: {
    SiteTemplate,
  },
  data() {
    return {
      user: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      person: {
        lastName: "",
        birthday: "",
        genre: "",
        cpf: "",
        rg: "",
        zip_code: "",
        address: "",
        number: "",
        neighborhood: "",
        complement: "",
        state: "",
        city: "",
        phone: "",
        cell_phone: "",
      },
      registerTab: 0,
    };
  },
  created() {
    debugger
    if (this.$store.getters.getUser) {
      let user = this.$store.getters.getUser;
      this.user.name = user.name;
      this.user.email = user.email;
      this.person.lastName = user.person.lastName;
      this.person.birthday = user.person.birthday;
      this.person.genre = user.person.genre;
      this.person.cpf = user.person.cpf;
      this.person.rg = user.person.rg;
      this.person.zip_code = user.person.zip_code;
      this.person.address = user.person.address;
      this.person.number = user.person.number;
      this.person.neighborhood = user.person.neighborhood;
      this.person.complement = user.person.complement;
      this.person.state = user.person.state;
      this.person.city = user.person.city;
      this.person.phone = user.person.phone;
      this.person.cell_phone = user.person.cell_phone;
    } else {
      this.$router.push("/login");
    }
  },
  methods: {
    clearFields() {
      this.person.address = "";
      this.person.neighborhood = "";
      this.person.complement = "";
      this.person.state = "";
      this.person.city = "";
    },
    testBirthday(){
      let d = new Date(this.person.birthday);
      let dif = new Date(new Date() - (1000*60*60*24*365*19));
      if ( d > dif ){
        return false;
      }
      return true;
      // var teste = new Date(new Date($this.person.birthday,'YYYY-MM-DD') - (1000*60*60*24*365*19));
      // let times = 19 * 365 * 24 * 60 * 10000;
      // alert(d);
    },
    researchViaCep() {
      let cep = this.person.zip_code;
      cep = cep.replace(/\D/g, "");

      if (cep != "") {
        var validacep = /^[0-9]{8}$/;

        if (validacep.test(cep)) {
          this.clearFields();
          this.$http
            .get(this.$urlViaCep + cep + `/json/`)
            .then((response) => {
              // this.person.zip_code = response.data.cep;

              let ibge = response.data.ibge;
              if (ibge.substr(0, 2) != "13") {
                M.toast({
                  html: "Desculpe-nos, mas esse cadastro só é permitido para o estado do Amazonas. Sentimos muito.",
                  classes: "rounded",
                });
                // this.person.zip_code = "";
                document.getElementById("person.zip_code").focus();
              } else {
                this.person.address = response.data.logradouro;
                this.person.neighborhood = response.data.bairro;
                this.person.complement = response.data.complemento;
                this.person.state = response.data.uf;
                this.person.city = response.data.localidade;
              }
            })
            .catch((error) => {
              this.person.zip_code = "";
              console.log(error);
              M.toast({
                html: "Ocorreu algum erro, entre em contato para que possamos solucionar.",
                classes: "rounded",
              });
              document.getElementById("person.zip_code").focus();
            });
        } else {
          M.toast({
            html: "Campo CEP inválido.",
            classes: "rounded",
          });
          // this.person.zip_code = "";
          this.clearFields();
          document.getElementById("person.zip_code").focus();
        }
      } else {
        M.toast({
          html: "Campo CEP obrigatório.",
          classes: "rounded",
        });
        // this.person.zip_code = "";
        this.clearFields();
        document.getElementById("person.zip_code").focus();
      }
    },
    concErro(error) {
      if (error.length > 0) {
        error = error + "</br> ";
      }
      return error;
    },
    changeTab() {
      let error = "";
      switch (this.registerTab) {
        case 0:
          if (this.user.email.trim() === "") {
            error = this.concErro(error);
            error = error + "Campo e-mail não informado!";
          }
          if (this.user.password_confirmation !== this.user.password) {
            error = this.concErro(error);
            error = error + "Campo confirmação de senha inválido!";
          }
          break;
        case 1:
          if (this.user.name.trim() === "") {
            error = this.concErro(error);
            error = error + "Campo nome não informado!";
          }
            if (this.person.lastName.trim() === "") {
              error = this.concErro(error);
              error = error + "Campo sobrenome não informado!";
            }
            if (this.person.birthday.trim() === "") {
              error = this.concErro(error);
              error = error + "Campo data aniversário não informado!";
            } else {
              if ( !this.testBirthday()) {
                error = this.concErro(error);
                error = error + "Desculpe-nos, mas esse cadastro só é permitido para maiores de 18 anos. Sentimos muito.";
              };
            }
            if (this.person.genre.trim() === "") {
              error = this.concErro(error);
              error = error + "Campo sexo não informado!";
            }
          if (this.person.cpf.trim() === "") {
            error = this.concErro(error);
            error =
              error +
              "Campo C.P.F. não informado!";
          }
          break;
        case 2:
          if (this.person.zip_code.trim() === "") {
            error = this.concErro(error);
            error = error + "Campo C.E.P. não informado!";
          }
          if (this.person.address.trim() === "") {
            error = this.concErro(error);
            error = error + "Campo endereço não informado!";
          }
          if (this.person.number.trim() === "") {
            error = this.concErro(error);
            error = error + "Campo número não informado!";
          }
          if (this.person.city.trim() === "") {
            error = this.concErro(error);
            error = error + "Campo cidade não informado!";
          }
          if (this.person.state.trim() === "") {
            error = this.concErro(error);
            error = error + "Campo estado não informado!";
          }
          break;
      }
      if (error.length === 0) {
        if (this.registerTab !== 2) {
          this.registerTab += 1;
          return false;
        }
        return true;
      }
      M.toast({ html: error, classes: "rounded" });
      return false;
    },
    saveProfile() {
      this.$http
        .put(
          this.$urlAPI + `user/update`,
          {
            name: this.user.name,
            password: this.user.password,
            password_confirmation: this.user.password_confirmation,
            lastName: this.person.lastName,
            birthday: this.person.birthday,
            genre: this.person.genre,
            cpf: this.person.cpf,
            rg: this.person.rg,
            zip_code: this.person.zip_code,
            address: this.person.address,
            number: this.person.number,
            neighborhood: this.person.neighborhood,
            complement: this.person.complement,
            state: this.person.state,
            city: this.person.city,
            phone: this.person.phone,
            cell_phone: this.person.cell_phone,
          },
          {
            headers: {
              authorization: "Bearer " + this.$store.getters.getToken,
            },
          }
        )
        .then((response) => {
          if (response.data.status) {
            if (response.data.user.token) {
              this.name = response.data.user.name;
              this.$store.commit("setUser", response.data.user);
              sessionStorage.setItem(
                "user",
                JSON.stringify(response.data.user)
              );
              M.toast({ html: "Perfil salvo com sucesso!", classes: "rounded" });
            } else {
              M.toast({ html: "Erro ao salvar perfil!", classes: "rounded" });
            }
          } else {
            let errors = response.data.message;
            for (let e of Object.values(response.data.errors)) {
              errors += "</br> " + e;
            }
            M.toast({ html: errors, classes: "rounded" });
          }
        })
        .catch((error) => {
          debugger;
          let errors = " ";
          if (error.response.data.message != error.response.data.errors) {
            for (let e of Object.values(error.response.data.errors)) {
              errors += e + "</br> ";
            }
          } else {
            errors = error.response.data.message;
          }
          M.toast({ html: errors, classes: "rounded" });
        });
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
