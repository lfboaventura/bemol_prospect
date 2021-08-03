<template>
  <span>
    <header>
      <nav-bar-layout logo="Bemol" url="/" color="#039be5 light-blue darken-1">
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/login">Entrar</router-link></li>
        <li><router-link to="/register">Cadastra-se</router-link></li>
      </nav-bar-layout>
    </header>
    <main>
      <div class="container">
        <div class="row">
          <grid-layout size="5">
            <card-menu-layout>
              <slot name="leftMenu" />
            </card-menu-layout>
          </grid-layout>
          <grid-layout size="7">
            <slot name="main" />
          </grid-layout>
        </div>
      </div>
    </main>

  </span>
</template>

<script>
import NavBarLayout from "@/components/layouts/NavBarLayout";
// import FooterLayout from "@/components/layouts/FooterLayout";
import GridLayout from "@/components/layouts/GridLayout";
import CardMenuLayout from "@/components/layouts/CardMenuLayout";

export default {
  name: "LoginTemplate",
  components: {
    NavBarLayout,
    // FooterLayout,
    GridLayout,
    CardMenuLayout,
  },
  data() {
    return {};
  },
  created() {
    if (this.$store.getters.getUser) {
      this.$router.push("/");
    }
  },
};
</script>

<style>
</style>
