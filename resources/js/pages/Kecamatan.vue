<template>
  <div class="bg-gray-100 font-family-karla flex">
    <sidebar-component></sidebar-component>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
      <header-component></header-component>

      <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6 bg-white">
          <h1 class="text-lg text-gray-500 pb-1 font-semibold">Data UMKM Kecamatan {{ namaKecamatan }}</h1>
          <!-- loader spin-->
          <div v-if="loading" class="z-30 flex justify-around relative opacity-75 bg-black inset-0">
            <svg class="w-12 absolute text-green-500" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
              <circle cx="15" cy="15" r="15">
                <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" />
                <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" />
              </circle>
              <circle cx="60" cy="15" r="9" fill-opacity="0.3">
                <animate attributeName="r" from="9" to="9" begin="0s" dur="0.8s" values="9;15;9" calcMode="linear" repeatCount="indefinite" />
                <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.8s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite" />
              </circle>
              <circle cx="105" cy="15" r="15">
                <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" />
                <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" />
              </circle>
            </svg>
          </div>

          <div class="w-full mt-2">
            <div class="bg-white overflow-auto">
              <vue-good-table
                mode="pages"
                @on-page-change="onPageChange"
                @on-sort-change="onSortChange"
                @on-column-filter="onColumnFilter"
                @on-per-page-change="onPerPageChange"
                paginate="true"
                :lineNumbers="false"
                :totalRows="totalRecords"
                :isLoading.sync="isLoading"
                :pagination-options="{
                  enabled: true,
                  nextLabel: 'next',
                  prevLabel: 'prev',
                  setCurrentPage: 1,
                  perPage: 15,
                  dropdownAllowAll: true,
                  rowsPerPageLabel: 'per halaman',
                  allLabel: 'Semua',
                  ofLabel: 'dari',
                }"
                :rows="rows"
                :columns="columns"
                :line-numbers="true"
              >
                <template slot="table-row" slot-scope="props">
                  <span v-if="props.column.field == 'action'">
                    <button class="bg-indigo-500 rounded-full border border-indigo-600 hover:bg-indigo-600 px-2 py-0 text-white font-semibold mx-1" @click="viewData(props.row.dfdesa_id)">View Data</button>
                  </span>
                  <span v-else>
                    {{ props.formattedRow[props.column.field] }}
                  </span>
                </template>
              </vue-good-table>
            </div>
          </div>
        </main>

        <footer-component></footer-component>
      </div>
    </div>
  </div>
</template>

<script>
import _ from "lodash";
export default {
  props: ["id"],
  data() {
    return {
      loading: true,
      unduhData: false,
      isLoggedIn: "false",
      kecamatan_id: "",
      isLoading: false,
      namaKecamatan: "",
      columns: [
        {
          label: "Nama Desa",
          field: "desa",
          sortable: true,
          width: "auto",
          filterable: true,
          filterOptions: {
            enabled: true,
            placeholder: "Filter",
            trigger: "enter",
          },
        },
        {
          label: "Jumlah UMKM",
          field: "jumlah_umkm",
          sortable: true,
          width: "auto",
        },
        {
          label: "Action",
          field: "action",
          sortable: false,
          width: "100px",
        },
      ],
      rows: [],
      totalRecords: 0,
      serverParams: {
        columnFilters: {},
        sort: {
          field: "",
          type: "desc",
        },
        page: 1,
        perPage: 15,
      },
    };
  },

  mounted() {
    this.isLoggedIn = localStorage.getItem("isLoggedIn");
    this.kecamatan_id = localStorage.getItem("kecamatan_id");
    this.getRecords();
  },

  methods: {
    viewData(param) {
      alert(param);
      //this.$router.push({
      //name: "kecamatan-desa",
      //params: {
      //id: param,
      //},
      //});
    },
    updateParams(newProps) {
      this.serverParams = Object.assign({}, this.serverParams, newProps);
    },
    onPageChange(params) {
      this.updateParams({ page: params.currentPage });
      this.getRecords();
    },
    onPerPageChange(params) {
      this.updateParams({ perPage: params.currentPerPage });
      this.getRecords();
    },
    onSortChange(params) {
      this.updateParams({
        sort: [
          {
            field: params[0].field,
            type: params[0].type,
          },
        ],
      });
      this.getRecords();
    },
    onColumnFilter(params) {
      // this.$set(this.columns[foundIndex].filterOptions, 'filterValue', value);
      this.updateParams(params);
      this.getRecords();
    },
    getRecords() {
      axios
        .get("/api/ukms-kecamatan/" + this.kecamatan_id, { params: this.serverParams })
        .then((response) => {
          this.loading = false;
          this.namaKecamatan = response.data.kecamatan[0].dfkecamatan_nama;
          this.totalRecords = response.data.data.total;
          this.rows = response.data.data.data;
          console.log(response.data);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style scoped></style>
