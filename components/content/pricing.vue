<template>
  <div class="lg:float-left lg:w-1/2 mt-28 mb-14 lg:pr-12">
    <slot />
  </div>
</template>

<style scoped>
:deep(table) {
  @apply w-full;
  @apply mt-6;
  @apply bg-white;
}

:deep(tr) {
  @apply border-b;
  @apply border-slate-200;
  @apply last-of-type:border-b-0
}

:deep(th) {
  @apply hidden;
}

:deep(td) {
  @apply py-2;
  @apply px-4;
}
</style>
