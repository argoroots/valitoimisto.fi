<!-- eslint-disable vue/multi-word-component-names -->
<script setup>
// const { t } = useI18n()
</script>

<template>
  <div class="relative isolate -m-6 overflow-hidden bg-slate-900 px-6 pt-0 shadow-2xl md:m-0 md:mt-6 md:rounded-3xl md:px-16 lg:flex lg:gap-x-20 lg:px-24">
    <svg
      viewBox="0 0 1024 1024"
      class="absolute left-1/2 top-1/2 -z-10 size-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] md:left-full md:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0"
      aria-hidden="true"
    >
      <circle
        cx="512"
        cy="512"
        r="512"
        fill="url(#759c1415-0410-454c-8f7c-9a820de03641)"
        fill-opacity="0.7"
      />
      <defs>
        <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
          <stop stop-color="#7775D6" />
          <stop
            offset="1"
            stop-color="#E935C1"
          />
        </radialGradient>
      </defs>
    </svg>

    <div class="mx-auto max-w-4xl py-12 text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
      <slot />
    </div>
  </div>
</template>

<style scoped>
:deep(h1) {
  @apply text-3xl;
  @apply md:text-4xl;
  @apply font-bold;
  @apply tracking-tight;
  @apply text-white;
}

:deep(p) {
  @apply text-lg;
  @apply text-white;
  @apply opacity-80;
}
</style>
