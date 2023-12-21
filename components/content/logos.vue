<template>
  <div class="mt-28">
    <slot />
  </div>
</template>

<style scoped>
:deep(p) {
  @apply block;
  @apply mt-8;
  @apply px-4;
  @apply py-4 sm:py-16;
  @apply grid;
  @apply grid-cols-2 sm:grid-cols-3;
  @apply justify-center;
  @apply items-center;
  @apply gap-4 sm:gap-16;
  @apply bg-white;
}
:deep(img) {
  @apply inline-block;
  @apply w-full;
  @apply h-24;
  @apply object-contain;
}
</style>
