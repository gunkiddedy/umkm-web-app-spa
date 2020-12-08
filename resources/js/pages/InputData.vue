<template>
  <div class="bg-gray-100 font-family-karla flex">
    <sidebar-component></sidebar-component>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
      <header-component></header-component>

      <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6 bg-white">
          <div v-if="loading" class="z-30 flex justify-around relative opacity-75 bg-black inset-0">
            <loader />
          </div>
          <!-- Content goes here! 😁 -->
          <h1 class="text-lg mb-4 font-semibold">Input Data UMKM</h1>
          <button class="bg-gray-300 hover:bg-gray-400 px-3 py-1 text-white text-xs rounded-full" @click="$router.go(-1)"><i class="fas fa-arrow-circle-left mr-3"></i> Back</button>
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
    };
  },
  mounted() {
    setTimeout(() => {
      this.loading = false;
    }, 700);
  },
};
</script>

<style scoped></style>
