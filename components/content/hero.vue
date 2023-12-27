<template>
  <div class="-m-6 md:m-0 md:mt-6 relative isolate overflow-hidden bg-slate-900 px-6 shadow-2xl md:rounded-3xl md:px-16 lg:flex lg:gap-x-20 lg:px-24 pt-0">
    <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] md:left-full md:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0" aria-hidden="true">
      <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.7" />
      <defs>
        <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
          <stop stop-color="#7775D6" />
          <stop offset="1" stop-color="#E935C1" />
        </radialGradient>
      </defs>
    </svg>

    <div class="mx-auto max-w-3xl text-center lg:mx-0 py-12 lg:flex-auto lg:py-32 lg:text-left">
      <slot />
      <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
        <a
          href="/send"
          class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-slate-900 shadow-sm hover:opacity-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white no-underline"
        >Saada andmed</a>

        <a
          href="/calculator"
          class="rounded-md px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:opacity-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white no-underline"
        >Kalkulaator <span aria-hidden="true">→</span></a>
      </div>
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
