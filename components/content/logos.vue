<!-- eslint-disable vue/multi-word-component-names -->
<template>
  <div class="mt-28 bg-white border border-slate-200">
    <slot />
  </div>
</template>

<style scoped>
:deep(h2) {
  @apply pt-8;
  @apply text-center;
}

:deep(p) {
  @apply block;
  @apply px-4;
  @apply py-4 sm:py-8;
  @apply grid;
  @apply grid-cols-2 sm:grid-cols-3;
  @apply justify-center;
  @apply items-center;
  @apply gap-4 sm:gap-16;
}

:deep(img) {
  @apply inline-block;
  @apply w-full;
  @apply h-24;
  @apply object-contain;
}
</style>
