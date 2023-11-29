<script setup>
useHead({
  titleTemplate: title => title ? `${title} · Välitoimisto Oy` : 'Välitoimisto Oy'
})
</script>

<template>
  <div class="h-auto min-h-full flex flex-col bg-slate-50">
    <header-nav />

    <main class="grow container mx-auto p-6 lg:px-8 bg-slate-50">
      <NuxtPage />
    </main>

    <footer-nav />
  </div>
</template>
