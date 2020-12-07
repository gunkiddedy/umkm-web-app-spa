<template>
  <div class="bg-gray-100 font-family-karla flex">
    <sidebar-component></sidebar-component>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
      <header-component></header-component>

      <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6 bg-white">
          <!-- Content goes here! 😁 -->
          <!--<h1 class="text-lg text-gray-500 pb-1 font-semibold">Download berdasarkan parameter</h1>-->
          <!-- This example requires Tailwind CSS v2.0+ -->
          <div class="bg-white shadow overflow-hidden sm:rounded-lg sm:w-full lg:w-2/3 mx-auto">
            <div class="px-4 py-5 sm:px-6">
              <h3 class="text-lg leading-6 font-medium text-gray-900">Form Download</h3>
              <p class="mt-1 max-w-2xl text-sm text-gray-500">Download berdasarkan parameter.</p>
            </div>
            <div class="border-t border-gray-200">
              <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Berdasarkan Kriteria</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <button @click="toggleModal" class="bg-indigo-500 rounded-full text-white px-4 py-1">Download</button>
                  </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Berdasarkan Usaha Pokok</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <button class="bg-indigo-500 rounded-full text-white px-4 py-1">Download</button>
                  </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Berdasarkan Desa</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <button class="bg-indigo-500 rounded-full text-white px-4 py-1">Download</button>
                  </dd>
                </div>
              </dl>
            </div>
            <!-- modal-->
            <div v-if="showModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-40 outline-none focus:outline-none justify-center items-center flex">
              <div class="leading-loose lg:w-1/3 sm:w-1/2">
                <div class="p-10 bg-white rounded-lg shadow-xl">
                  <div class="py-2 my-1">
                    <label class="block text-sm text-gray-600" for="name">Kecamatan</label>
                    <select name="dfkecamatan_id" id="dfkecamatan_id" v-model="select_kecamatan" @change="loadDesa" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-1 pr-8 rounded-lg text-gray-500 leading-tight focus:outline-none">
                      <option class="text-gray-700" value="" selected="selected">-Select Kecamatan-</option>
                      <option class="text-gray-700" v-for="(kec, i) in kecamatans" :value="kec.dfkecamatan_id" :key="i">
                        {{ kec.dfkecamatan_nama }}
                      </option>
                    </select>
                  </div>
                  <div class="py-2 my-1">
                    <label class="block text-sm text-gray-600" for="name">Desa</label>
                    <select name="dfdesa_id" id="dfdesa_id" v-model="select_desa" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-1 pr-8 rounded-lg text-gray-500 leading-tight focus:outline-none">
                      <option class="text-gray-700" value="" selected="selected">-Select Desa-</option>
                      <option class="text-gray-700" v-for="(desa, i) in desas" :key="i" :value="desa.dfdesa_id">
                        {{ desa.dfdesa_nama }}
                      </option>
                    </select>
                  </div>
                  <div class="py-2 my-1">
                    <label class="block text-sm text-gray-600" for="name">Kriteria</label>
                    <select v-model="select_kriteria" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-1 pr-8 rounded-lg text-gray-500 leading-tight focus:outline-none">
                      <option class="text-gray-700" value="" selected="selected">-Select Kriteria-</option>
                      <option class="text-gray-700" v-for="(krit, i) in kriterias" :value="krit.kriteria" :key="i">
                        {{ krit.kriteria }}
                      </option>
                    </select>
                  </div>
                  <div class="py-2 my-1">
                    <label class="block text-sm text-gray-600" for="name">Usaha Pokok</label>
                    <select v-model="select_usaha_pokok" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-1 pr-8 rounded-lg text-gray-500 leading-tight focus:outline-none">
                      <option class="text-gray-700" value="" selected="selected">-Select Usaha Pokok-</option>
                      <option class="text-gray-700" v-for="(up, i) in usahas" :value="up.field" :key="i">
                        {{ up.usaha }}
                      </option>
                    </select>
                  </div>
                  <div class="mt-6 flex items-center justify-end">
                    <button @click="toggleModal" class="px-3 py-1 text-sm text-white bg-red-600 rounded-full"><i class="fas fa-times mr-2"></i> Close</button>
                    <button @click="toggleModal" class="ml-4 px-3 py-1 text-sm text-white bg-indigo-600 rounded-full"><i class="fas fa-arrow-circle-down mr-2"></i> Download</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>

        <div v-if="showModal" class="opacity-25 fixed inset-0 z-30 bg-black"></div>

        <footer-component></footer-component>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showModal: false,
      kecamatans: [],
      desas: [],
      kriterias: [],
      usahas: [],
      select_kecamatan: "",
      select_desa: "",
      select_kriteria: "",
      select_usaha_pokok: "",
    };
  },
  created() {
    this.loadKecamatan();
    this.loadKriteria();
    this.loadUsaha();
  },
  methods: {
    toggleModal() {
      this.showModal = !this.showModal;
    },
    loadUsaha() {
      axios
        .get("/api/get-usaha-pokok")
        .then((response) => {
          this.usahas = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    loadKriteria() {
      axios
        .get("/api/get-kriteria")
        .then((response) => {
          this.kriterias = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    loadKecamatan() {
      axios
        .get("/api/get-kecamatans")
        .then((response) => {
          this.kecamatans = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    loadDesa() {
      axios
        .get("/api/get-desa-by-kecamatan-id", {
          params: {
            dfkecamatan_id: this.select_kecamatan,
          },
        })
        .then((response) => {
          this.desas = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style scoped></style>
