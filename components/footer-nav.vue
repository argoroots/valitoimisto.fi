<script setup>
import { marked } from 'marked'

const { t } = useI18n()

const showBanner = ref(false)

const renderer = new marked.Renderer()

renderer.link = ({ href, text }) => {
  const isExternal = href.startsWith('http')
  const target = isExternal ? ' target="_blank" rel="noopener noreferrer"' : ''

  return `<a href="${href}"${target}>${text}</a>`
}

const navInfoHtml = computed(() => marked.parseInline(t('navInfo'), { renderer }))

function closeBanner () {
  showBanner.value = false
  localStorage.setItem('nav-banner-closed', 'true')
}

onMounted(() => {
  showBanner.value = localStorage.getItem('nav-banner-closed') !== 'true'
})
</script>

<template>
  <div
    v-if="showBanner"
    class="border-t border-purple-100 bg-purple-50 text-sm"
  >
    <div class="container mx-auto flex items-center justify-center gap-4 px-6 py-3 lg:px-8">
      <span v-html="navInfoHtml" />
      <button
        class="text-purple-600 hover:text-purple-900"
        type="button"
        aria-label="Close"
        @click="closeBanner"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="size-5"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"
          />
        </svg>
      </button>
    </div>
  </div>

  <footer class="border-t border-purple-100 bg-white text-sm font-thin">
    <div class="container mx-auto flex flex-col gap-4 p-6 sm:flex-row sm:justify-between lg:px-8">
      <nuxt-link
        class="font-medium text-purple-900 no-underline"
        :to="t('navContactUrl')"
      >
        {{ t('navHome') }}
      </nuxt-link>

      <div class="flex flex-wrap gap-4">
        <nuxt-link
          class="hover:text-purple-900 hover:underline"
          :to="t('navAnnualReportsUrl')"
        >
          {{ t('navAnnualReports') }}
        </nuxt-link>

        <nuxt-link
          class="hover:text-purple-900 hover:underline"
          :to="t('navLawsUrl')"
        >
          {{ t('navLaws') }}
        </nuxt-link>

        <nuxt-link
          class="hover:text-purple-900 hover:underline"
          :to="t('navTermsUrl')"
        >
          {{ t('navTerms') }}
        </nuxt-link>
      </div>
    </div>
  </footer>
</template>
