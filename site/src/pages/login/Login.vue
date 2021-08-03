<template>
  <login-template>
    <span slot="leftMenu">
      <img
        src="../../assets/bemol.png"
        alt="Bemol"
        class="responsive-img"
      />
    </span>
    <span slot="main">
      <span class="center-align">
        <h5>Login</h5>
      </span>

      <div class="row">
        <div class="input-field">
          <label for="email">E-mail *</label>
          <input id="email" type="email" required maxlength="100" v-model="email" />
        </div>
      </div>

      <div class="row">
        <div class="input-field">
          <label for="password">Senha *</label>
          <input id="password" type="password" required maxlength="100" v-model="password" />
        </div>
      </div>

      <button v-on:click="login" class="btn waves-effect waves-light">
        Login
      </button>
      <router-link to="/register" class="btn orange waves-effect waves-light"
        >Casdastre-se</router-link
      ></span
    >
  </login-template>
</template>

<script>
import LoginTemplate from "@/templates/LoginTemplate";

export default {
  name: "Login",
  components: {
    LoginTemplate,
  },
  data() {
    return { email: "", password: "" };
  },
  methods: {
    login() {
      this.$http
        .post(this.$urlAPI + `login`, {
          email: this.email,
          password: this.password,
        })
        .then((response) => {
            debugger
          if (response.data.status) {
            if (response.data.user.token) {
              this.$store.commit("setUser", response.data.user);
              sessionStorage.setItem(
                "user",
                JSON.stringify(response.data.user)
              );
              this.$router.push("/");
            } else {
              M.toast({html: "Usuário inválido!", classes: 'rounded'});
            }
          } else {
            let errors = response.data.message;
            for (let e of Object.values(response.data.errors)) {
              errors += "</br> " + e;
            }
            M.toast({html: errors, classes: 'rounded'});
          }
        })
        .catch((error) => {
          let errors = ' ';
          if ( error.response.data.message != (error.response.data.errors )){
            for (let e of Object.values(error.response.data.errors)) {
              errors += e + "</br> " ;
            }
          } else {
            errors = error.response.data.message;
          }
          M.toast({html: errors, classes: 'rounded'});
        });
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
