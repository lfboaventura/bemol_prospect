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
        <div class="row">
          <label for="user.email">E-mail</label>
          <div class="input-field col s12">
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
          <label for="user.name">Nome </label>
          <div class="input-field col s12">
            <input
              id="user.name"
              type="text"
              required
              maxlength="100"
              v-model="user.name"
              disabled
            />
          </div>
        </div>

        <span>
          <div class="row">
            <div class="input-field col s8">
              <label for="person.lastName">Sobrenome </label>
              <input
                id="person.lastName"
                type="text"
                maxlength="50"
                v-model="person.lastName"
                disabled
              />
            </div>

            <div class="input-dated col s4">
              <label for="person.birthday">Aniversário</label>
              <input
                id="person.birthday"
                type="date"
                v-model="person.birthday"
                class="datepicker"
                disabled
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
                disabled
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
                disabled
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
              disabled
            />
           <label for="person.cpf">C.P.F. </label>
          </div>

          <div class="input-field col s6">
            <input
              type="number"
              id="person.rg"
              maxlength="50"
              v-model="person.rg"
              disabled
            />
            <label for="person.rg"> R.G. </label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input
              id="person.zip_code"
              type="text"
              required
              maxlength="10"
              mask
              v-model="person.zip_code"
              disabled
            />
            <label for="person.zip_code">C.E.P. </label>
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
              disabled
            />
            <label for="person.address">Endereço</label>
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
              disabled
            />
            <label for="person.number">Número</label>
          </div>

          <div class="input-field col s8">
            <input
              id="person.neighborhood"
              type="text"
              maxlength="50"
              v-model="person.neighborhood"
              disabled
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
              disabled
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
              disabled
            />
            <label for="person.city">Cidade</label>
          </div>

          <div class="input-field col s4">
            <input
              id="person.state"
              type="text"
              required
              maxlength="2"
              v-model="person.state"
              disabled
            />
            <label for="person.state">Estado</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <input
              id="person.phone"
              type="number"
              maxlength="15"
              v-model="person.phone"
              disabled
            />
            <label for="person.phone">Telefone</label>
          </div>

          <div class="input-field col s6">
            <input
              id="person.cell_phone"
              type="text"
              maxlength="15"
              v-model="person.cell_phone"
              disabled
            />
            <label for="person.cell_phone">Celular</label>
          </div>
        </div>

    </span>

  </site-template>
</template>

<script>
import SiteTemplate from "@/templates/SiteTemplate";
import GridLayout from "@/components/layouts/GridLayout";

export default {
  name: "Home",
  components: {
    SiteTemplate,
    GridLayout,
  },
  computed: {
  },
  data() {
    return {
      user: {
        name: "",
        email: "",
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
    };
  },
  created() {
    if (sessionStorage.getItem("user")) {
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
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
