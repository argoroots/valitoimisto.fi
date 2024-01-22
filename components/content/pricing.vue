<!-- eslint-disable vue/multi-word-component-names -->
<template>
  <div class="lg:float-left lg:w-1/2 mt-28 mb-14 lg:pr-12">
    <slot />
  </div>
</template>

<style scoped>
:deep(table) {
  @apply bg-white;
  @apply table-auto;
}
</style>
