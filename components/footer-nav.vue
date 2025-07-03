<script setup>
const { t } = useI18n()
</script>

<template>
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
