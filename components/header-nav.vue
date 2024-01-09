<script setup>
import { Dialog, DialogPanel, Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon, LanguageIcon } from '@heroicons/vue/24/outline'

const { t, locale } = useI18n()
const { page } = useContent()

const mobileMenuOpen = ref(false)

const paths = computed(() => Object.entries(page.value?.paths || {}).map(([key, value]) => ({ key, value })).filter(x => x.key !== locale.value))
</script>

<template>
  <header class="bg-white sticky top-0 border-b border-purple-100 z-10">
    <nav class="container mx-auto flex items-center justify-between px-6 py-3 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a :href="t('navHomeUrl')" class="text-lg text-purple-900 font-extrabold">
          {{ t('navHome') }}
        </a>
      </div>

      <div class="hidden lg:flex lg:gap-x-12 lg:items-center">
        <a :href="t('navCalculatorUrl')" class="nav">
          {{ t('navCalculator') }}
        </a>
        <a :href="t('navBookkeepingUrl')" class="nav">
          {{ t('navBookkeeping') }}
        </a>
        <a :href="t('navContactUrl')" class="nav">
          {{ t('navContact') }}
        </a>

        <a :href="t('navSendDataUrl')" class="px-3.5 py-2.5 rounded-md text-sm font-semibold text-white bg-purple-900">
          {{ t('navSendData') }}
        </a>

        <Menu as="div" class="relative inline-block text-left">
          <div>
            <MenuButton class="nav inline-flex uppercase">
              <LanguageIcon
                class="size-5 text-slate-900 hover:text-slate-600"
                aria-hidden="true"
              />
            </MenuButton>
          </div>

          <transition
            enter-active-class="transition duration-100 ease-out"
            enter-from-class="transform scale-95 opacity-0"
            enter-to-class="transform scale-100 opacity-100"
            leave-active-class="transition duration-75 ease-in"
            leave-from-class="transform scale-100 opacity-100"
            leave-to-class="transform scale-95 opacity-0"
          >
            <MenuItems class="absolute right-0 mt-2 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none">
              <div class="px-1 py-1">
                <MenuItem
                  v-for="path in paths"
                  :key="path.key"
                  v-slot="{ active }"
                >
                  <a
                    class="group flex w-full items-center rounded-md px-2 py-2 text-sm whitespace-nowrap"
                    :href="path.value"
                    :class="[
                      active ? 'bg-violet-500 text-white' : 'text-gray-900'
                    ]"
                  >
                    {{ t(`locale${path.key.toUpperCase()}`) }}
                  </a>
                </MenuItem>
              </div>
            </menuitems>
          </transition>
        </Menu>
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
              <a
                class="nav-mobile sm:hidden"
                :href="t('navHomeUrl')"
              >
                {{ t('navHome') }}
              </a>
              <a
                class="nav-mobile"
                :href="t('navCalculatorUrl')"
              >
                {{ t('navCalculator') }}
              </a>
              <a
                class="nav-mobile"
                :href="t('navBookkeepingUrl')"
              >
                {{ t('navBookkeeping') }}
              </a>
              <a
                class="nav-mobile"
                :href="t('navContactUrl')"
              >
                {{ t('navContact') }}
              </a>
              <a
                class="nav-mobile"
                :href="t('navSendDataUrl')"
              >
                {{ t('navSendData') }}
              </a>
            </div>
            <div class="space-y-2 py-6">
              <a
                v-for="path in paths"
                :key="path.key"
                class="nav-mobile !font-normal"
                :href="path.value"
              >
                {{ t(`locale${path.key.toUpperCase()}`) }}
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

a.nav {
  @apply text-sm font-semibold text-slate-900 hover:text-purple-900
}

a.nav-mobile {
  @apply -mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-slate-900 hover:bg-slate-50
}
</style>
