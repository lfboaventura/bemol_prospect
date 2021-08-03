<template>
  <span>
    <header>
      <nav-bar-layout logo="Bemol" url="/" color="#039be5 light-blue darken-1">
        <li><router-link to="/">Home</router-link></li>
        <li>
          <router-link to="/profile">Meu Perfil</router-link>
        </li>
        <li><a v-on:click="exit()">Sair</a></li>
      </nav-bar-layout>
    </header>
    <main>
      <div class="container">
        <div class="row">
          <grid-layout size="4">
            <card-menu-layout>
              <slot name="leftMenu" />
            </card-menu-layout>
          </grid-layout>
          <grid-layout size="8">
            <slot name="main" />
          </grid-layout>
        </div>
      </div>
    </main>

  </span>
</template>

<script>
import NavBarLayout from "@/components/layouts/NavBarLayout";
import GridLayout from "@/components/layouts/GridLayout";
import CardMenuLayout from "@/components/layouts/CardMenuLayout";

export default {
  name: "SiteTemplate",
  components: {
    NavBarLayout,
    GridLayout,
    CardMenuLayout,
  },
  created() {
    if (this.$store.getters.getUser) {
      this.user = this.$store.getters.getUser;
    } else {
      this.$router.push("/login");
    }
  },
  data() {
    return {
      user: false,
    };
  },
  methods: {
    exit() {
      this.$store.commit('setUser',null);
      sessionStorage.clear();
      this.$router.push("/login");
    },
  },
};
</script>

<style>
</style>
