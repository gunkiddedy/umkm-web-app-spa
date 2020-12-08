<template>
  <div class="bg-gray-100 font-family-karla flex">
    <sidebar-component></sidebar-component>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
      <header-component></header-component>

      <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6 bg-white shadow">
          <!-- SEARCH PRODUCTS-->
          <div class="w-2/3 relative mx-auto">
            <form @submit.prevent="searchProducts">
              <button type="submit" class="absolute right-0 mt-2 mr-2 text-gray-500">
                <svg class="w-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                  <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
              </button>
              <input v-model="selected.keywords" class="shadow appearance-none rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-inner focus:bg-gray-100" id="search" type="search" placeholder="Search products" />
            </form>
          </div>
          <!-- PRODUCTS  -->
          <div class="mt-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            <div class="text-gray-700 rounded-lg bg-white shadow-md h-72 relative" v-for="product in products.data" :key="product.id">
              <div>
                <img :src="'/storage/' + product.product_path" alt="" class="hover:opacity-75 rounded-t-lg object-cover w-full h-41" />
              </div>
              <div class="w-full absolute px-4 py-4 bg-white rounded-md leading-tight hover:transition duration-300 ease-in-out h-30 -mt-2 overflow-y-hidden hover:h-72 hover:-mt-41">
                <div>
                  <div class="flex items-center justify-start mb-6">
                    <i class="fas fa-bookmark mr-3"></i>
                    <span class="uppercase text-gray-500 font-bold text-sm">
                      {{ product.product_name }}
                    </span>
                  </div>
                  <div class="flex items-center justify-start mb-8">
                    <i class="fas fa-user mr-3"></i>
                    <span class="text-gray-500 font-semibold text-xs hover:text-blue-400">
                      {{ product.product_owner }}
                    </span>
                  </div>
                  <div class="flex items-center justify-start mb-6">
                    <i class="fas fa-home mr-3"></i>
                    <span class="uppercase text-xs text-gray-300">{{ product.product_address }}</span>
                  </div>

                  <div class="flex items-center justify-start mb-6">
                    <i class="fas fa-phone mr-3"></i>
                    <span class="text-gray-300 text-xs uppercase">{{ product.product_phone }}</span>
                  </div>

                  <div class="flex items-center justify-start mb-4">
                    <i class="fas fa-envelope mr-3"></i>
                    <span class="text-blue-300 font-semibold text-xs">@{{ product.product_email }}</span>
                  </div>
                  <router-link :to="{ name: 'product-detail', params: { id: product.id } }">
                    <button type="button" class="hover:bg-blue-700 bg-blue-600 px-6 py-2 w-full rounded-lg">
                      <span class="text-white leading-none font-bold text-sm">Lihat Produk</span>
                    </button>
                  </router-link>
                </div>
              </div>
            </div>
          </div>

          <!-- loader spin-->
          <div v-if="loading" class="z-30 flex justify-around relative opacity-25 bg-black inset-0">
            <loader />
          </div>

          <div v-if="product_not_found" class="my-4 flex justify-center text-gray-500">
            {{ product_not_found }}
          </div>

          <!-- PAGINATION -->
          <div class="flex justify-around items-center mt-16">
            <pagination :pagination="pagination" @paginate="loadProducts" />
          </div>
        </main>

        <div v-if="loading" class="opacity-25 fixed inset-0 z-30 bg-black"></div>
        <footer-component></footer-component>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: true,
      products: {},
      product_not_found: "",
      totalProducts: 0,
      selected: {
        keywords: "",
        selectedProvinsi: [],
        selectedKabupaten: [],
      },
      pagination: {},
    };
  },
  created() {
    this.getTotalProducts();
  },
  mounted() {
    this.loadProducts();
  },
  computed: {
    getKeyword: function () {
      this.selected.keywords = this.$store.getters["searchProducts/get_keyword"];
    },
  },
  watch: {
    selected: {
      handler: function () {
        this.loadProducts();
      },
      deep: true,
    },
  },
  methods: {
    searchProducts() {
      this.$store.dispatch("searchProducts/handleSearchProducts", this.selected.keywords);
    },
    getTotalProducts() {
      axios
        .get("/api/total-products")
        .then((res) => {
          console.log(res.data);
          this.totalProducts = res.data.length;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    loadProducts: function () {
      let current_page = this.pagination.current_page;
      let pageNum = current_page ? current_page : 1;
      axios
        .get(`/api/products?page=${pageNum}`, {
          params: this.selected,
        })
        .then((response) => {
          this.loading = false;
          this.products = response.data;
          this.pagination = response.data.meta;
          // console.log(response.data);
          this.currentProducts = response.data.data.length;
          if (!response.data.data.length) this.product_not_found = "product not found";
          else this.product_not_found = "";
          // console.log(`data product sekarang: ${response.data.data.length}`);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>

<style scoped></style>
