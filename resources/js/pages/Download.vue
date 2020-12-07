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
          <div class="bg-white shadow overflow-hidden sm:rounded-lg w-1/2 mx-auto">
            <div class="px-4 py-5 sm:px-6">
              <h3 class="text-lg leading-6 font-medium text-gray-900">Form Download</h3>
              <p class="mt-1 max-w-2xl text-sm text-gray-500">Download berdasarkan parameter.</p>
            </div>
            <div class="border-t border-gray-200">
              <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Berdasarkan Kriteria</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <button class="bg-indigo-500 rounded-full text-white px-4 py-1">Download</button>
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
          </div>
        </main>

        <footer-component></footer-component>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
};
</script>

<style scoped></style>
