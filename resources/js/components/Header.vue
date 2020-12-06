<template>
  <div>
    <header class="w-full flex items-center bg-gray-100 py-2 px-6 hidden sm:flex">
      <div class="w-1/2"></div>
      <div :data="isOpen" class="relative w-1/2 flex justify-end">
        <!--<button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
          <img src="/img/cantik.jpg" />
        </button>-->
        <button @click="logout" class="realtive">
          <i class="fas fa-sign-out-alt mr-3"></i>
        </button>
        <!--<button v-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div v-show="isOpen" class="z-10 absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
          <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
          <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
          <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
        </div>-->
      </div>
    </header>

    <!-- Mobile Header & Nav -->
    <header :data="isOpen" class="w-full bg-sidebar py-5 px-6 sm:hidden">
      <div class="flex items-center justify-between">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">UMKM GK</a>
        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
          <i v-show="!isOpen" class="fas fa-bars"></i>
          <i v-show="isOpen" class="fas fa-times"></i>
        </button>
      </div>

      <!-- Dropdown Nav -->
      <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
        <!--<a href="index.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-tachometer-alt mr-3"></i>
          Dashboard
        </a>
        <a href="blank.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
          <i class="fas fa-sticky-note mr-3"></i>
          Blank Page
        </a>
        <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-table mr-3"></i>
          Tables
        </a>
        <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-align-left mr-3"></i>
          Forms
        </a>
        <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-tablet-alt mr-3"></i>
          Tabbed Content
        </a>
        <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-calendar mr-3"></i>
          Calendar
        </a>
        <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-cogs mr-3"></i>
          Support
        </a>
        <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-user mr-3"></i>
          My Account
        </a>
        <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-sign-out-alt mr-3"></i>
          Sign Out
        </a>-->
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
        <router-link :to="{ name: 'login' }" class="absolute w-full upgrade-btn bottom-0 text-white flex items-center justify-center py-4" v-if="isLoggedIn == 'false'">
          <i class="fas fa-sign-in-alt mr-3"></i>
          Login
        </router-link>
        <button @click="logout" class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center" v-if="isLoggedIn == 'true'">
          <i class="fas fa-sign-out-alt mr-3"></i>
          Logout
        </button>
        <!--<button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center"><i class="fas fa-arrow-circle-up mr-3"></i> Call Our Deveeloper</button>-->
      </nav>
    </header>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isOpen: false,
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
