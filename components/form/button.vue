<!-- eslint-disable vue/multi-word-component-names -->
<script setup>
const emit = defineEmits(['click'])
</script>

<template>
  <button @click="emit('click')">
    <slot />
  </button>
</template>

<style scoped>
button {
  @apply h-10;
  @apply w-full;
  @apply mt-4;
  @apply px-2;
  @apply border;
  @apply rounded-md;
  @apply text-purple-600;
  @apply border-purple-300;
  @apply hover:text-white;
  @apply hover:bg-purple-300;
  @apply active:bg-purple-200;
}
</style>
