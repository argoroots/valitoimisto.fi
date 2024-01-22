<!-- eslint-disable vue/multi-word-component-names -->
<template>
  <div class="lg:float-right lg:w-1/2 mt-28 mb-14 lg:pl-12">
    <slot />
  </div>
</template>

<style scoped>
:deep(p) {
  @apply mb-6;
  @apply last-of-type:mb-0;
}
</style>
