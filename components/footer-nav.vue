<script setup>
const { t } = useI18n()
</script>

<template>
  <footer class="text-thin text-sm bg-white border-t border-purple-100">
    <div class="container mx-auto p-6 lg:px-8 flex justify-between">
      <a :href="t('navHomeUrl')" class="text-purple-900 font-medium no-underline">
        {{ t('navHome') }}
      </a>

      <a class="hover:underline hover:text-purple-900" :href="t('navTermsUrl')">{{ t('navTerms') }}</a>
    </div>
  </footer>
</template>
