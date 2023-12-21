<template>
  <div class="h-auto min-h-full flex flex-col bg-slate-50">
    <header-nav />

    <main class="grow container max-w-4xl mx-auto py-12 lg:py-24 px-8 lg:px-8 bg-slate-50">
      <slot />
    </main>

    <footer-nav />
  </div>
</template>
