<script setup>
const { t } = useI18n()
</script>

<template>
  <footer class="border-t border-purple-100 bg-white text-sm font-thin">
    <div class="container mx-auto flex justify-between p-6 lg:px-8">
      <nuxt-link
        class="font-medium text-purple-900 no-underline"
        :to="t('navHomeUrl')"
      >
        {{ t('navHome') }}
      </nuxt-link>

      <nuxt-link
        class="hover:text-purple-900 hover:underline"
        :to="t('navTermsUrl')"
      >
        {{ t('navTerms') }}
      </nuxt-link>
    </div>
  </footer>
</template>
