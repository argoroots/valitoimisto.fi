<script setup>
import { Dialog, DialogPanel } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'

const mobileMenuOpen = ref(false)
</script>

<template>
  <header class="bg-white sticky top-0 border-b border-purple-100 z-10">
    <nav class="container mx-auto flex items-center justify-between px-6 py-3 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="/" class="text-lg text-purple-900 font-extrabold">
          Välitoimisto Oy
        </a>
      </div>

      <div class="hidden lg:flex lg:gap-x-12 lg:items-center">
        <a href="/calculator" class="text-sm font-semibold text-slate-900 hover:text-purple-900">
          Kalkulaator
        </a>
        <a href="/accounting" class="text-sm font-semibold text-slate-900 hover:text-purple-900">
          Raamatupidamisteenus
        </a>
        <a href="/contact" class="text-sm font-semibold text-slate-900 hover:text-purple-900">
          Kontakt
        </a>
        <a href="/send" class="px-3.5 py-2.5 rounded-md text-sm font-semibold text-white bg-purple-900">
          Saada andmed
        </a>
      </div>

      <div class="flex lg:hidden">
        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-slate-700" @click="mobileMenuOpen = true">
          <span class="sr-only">Open main menu</span>
          <Bars3Icon class="h-6 w-6" aria-hidden="true" />
        </button>
      </div>
    </nav>

    <Dialog as="div" class="lg:hidden" :open="mobileMenuOpen" @close="mobileMenuOpen = false">
      <div class="fixed inset-0 z-10" />

      <DialogPanel class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-slate-900/10">
        <div class="flex items-center justify-end">
          <button type="button" class="-m-2.5 rounded-md p-2.5 text-slate-700" @click="mobileMenuOpen = false">
            <span class="sr-only">Close menu</span>
            <XMarkIcon class="h-6 w-6" aria-hidden="true" />
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-slate-500/10">
            <div class="space-y-2 py-6">
              <a href="/" class="sm:hidden -mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-slate-900 hover:bg-slate-50">
                Avaleht
              </a>
              <a href="/calculator" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-slate-900 hover:bg-slate-50">
                Kalkulaator
              </a>
              <a href="/accounting" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-slate-900 hover:bg-slate-50">
                Raamatupidamisteenus
              </a>
              <a href="/contact" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-slate-900 hover:bg-slate-50">
                Kontakt
              </a>
              <a href="/send" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-white bg-purple-900">
                Saada andmed
              </a>
            </div>
          </div>
        </div>
      </DialogPanel>
    </Dialog>
  </header>
</template>

<style scoped>
a {
  @apply no-underline;
}
</style>
