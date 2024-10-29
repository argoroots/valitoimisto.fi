<template>
  <div class="flex h-auto min-h-full flex-col bg-slate-50">
    <header-nav />

    <main class="container mx-auto max-w-4xl grow bg-slate-50 px-8 py-12 lg:px-8 lg:py-24">
      <slot />
    </main>

    <footer-nav />
  </div>
</template>
