<template>
  <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-4">
      <!--<a href="#" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>-->
      <div class="realtive w-20 h-20 rounded-full overflow-hidden border-2 border-gray-100 hover:border-gray-200 focus:border-gray-200 focus:outline-none mb-1 mx-auto">
        <img src="/img/cantik.jpg" />
      </div>
      <router-link :to="{ name: 'input', params: { id: 1 } }">
        <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center"><i class="fas fa-plus mr-3"></i> New Data</button>
      </router-link>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
      <router-link :to="{ name: 'public' }" class="flex items-center text-white py-4 pl-6 nav-item">
        <i class="fas fa-tachometer-alt mr-3"></i>
        Home
      </router-link>
      <router-link :to="{ name: 'desa', params: { id: desa_id } }" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-sticky-note mr-3"></i>
        UMKM Desa
      </router-link>
      <router-link :to="{ name: 'kecamatan', params: { id: kecamatan_id } }" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-table mr-3"></i>
        UMKM Kecamatan
      </router-link>
      <router-link :to="{ name: 'admin' }" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-align-left mr-3"></i>
        Admin
      </router-link>
      <router-link :to="{ name: 'global' }" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-tablet-alt mr-3"></i>
        Global UMKM
      </router-link>
      <router-link :to="{ name: 'download' }" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-calendar mr-3"></i>
        Download Data
      </router-link>
    </nav>
    <router-link :to="{ name: 'login' }" class="absolute w-full upgrade-btn bottom-0 text-white flex items-center justify-center py-4" v-if="isLoggedIn == 'false'">
      <i class="fas fa-sign-in-alt mr-3"></i>
      Login
    </router-link>
    <button @click="logout" class="absolute w-full upgrade-btn bottom-0 text-white flex items-center justify-center py-4" v-if="isLoggedIn == 'true'">
      <i class="fas fa-sign-out-alt mr-3"></i>
      Logout
    </button>
  </aside>
</template>

<script>
export default {
  data() {
    return {
      desa_id: 1,
      kecamatan_id: 18,
      isLoggedIn: false,
    };
  },
  mounted() {
    this.isLoggedIn = localStorage.getItem("isLoggedIn");
    this.desa_id = localStorage.getItem("desa_id");
    this.kecamatan_id = localStorage.getItem("kecamatan_id");
  },
  methods: {
    logout() {
      axios
        .post("/api/logout")
        .then((res) => {
          this.$router.push({
            name: "login",
          });
          localStorage.setItem("isloggedIn", "false");
          localStorage.removeItem("username");
          localStorage.removeItem("desa_id");
          localStorage.removeItem("kecamatan_id");
          localStorage.removeItem("user_role");
          this.isloggedIn = "false";
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style scoped>
.router-link-active,
.router-link-exact-active {
  background-color: #1947ee;
  color: #e2e8f0;
  cursor: pointer;
  border-radius: 0.5rem;
}
</style>
