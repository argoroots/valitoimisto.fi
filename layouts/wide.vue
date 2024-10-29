<template>
  <div class="flex h-auto min-h-full flex-col bg-slate-50">
    <header-nav />

    <main class="container mx-auto grow bg-slate-50 p-6 lg:px-8">
      <slot />
    </main>

    <footer-nav />
  </div>
</template>
