<script setup>
const { t } = useI18n()
</script>

<template>
  <footer class="text-thin text-sm bg-white border-t border-purple-100">
    <div class="container mx-auto p-6 lg:px-8 flex justify-between">
      <nuxt-link
        class="text-purple-900 font-medium no-underline"
        :to="t('navHomeUrl')"
      >
        {{ t('navHome') }}
      </nuxt-link>

      <nuxt-link
        class="hover:underline hover:text-purple-900"
        :to="t('navTermsUrl')"
      >
        {{ t('navTerms') }}
      </nuxt-link>
    </div>
  </footer>
</template>
