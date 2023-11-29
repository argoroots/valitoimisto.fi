<!-- eslint-disable vue/multi-word-component-names -->
<script setup>
const emit = defineEmits(['click'])
</script>

<template>
  <button @click.prevent="emit('click')">
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
  @apply text-indigo-600;
  @apply border-indigo-300;
  @apply hover:bg-indigo-100;
  @apply hover:text-indigo-600;
  @apply active:bg-indigo-200;
}
</style>
