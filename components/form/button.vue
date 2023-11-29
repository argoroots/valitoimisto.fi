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
  @apply rounded-full;
  @apply text-purple-600;
  @apply border-purple-300;
  @apply hover:text-purple-900;
  @apply hover:border-purple-900;
  @apply hover:bg-purple-100;
  @apply active:bg-purple-200;
}
</style>
