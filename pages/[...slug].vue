<script setup>
const { locale } = useI18n()
const { page } = useContent()

locale.value = page.value?._dir || page.value?._path.split('/').at(1) || 'et'

useHead({
  htmlAttrs: {
    lang: locale.value
  }
})

onMounted(() => {
  console.log(page.value)
})
</script>

<template>
  <NuxtLayout>
    <main class="mx-auto">
      <ContentDoc>
        <template #not-found>
          <div class="w-full text-center">
            <p class="text-base font-semibold text-purple-900">
              404
            </p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-slate-900 sm:text-5xl">
              Page not found
            </h1>
            <p class="mt-6 text-base leading-7 text-slate-600">
              Sorry, we couldn’t find the page you’re looking for.
            </p>
          </div>
        </template>
      </ContentDoc>
    </main>
  </NuxtLayout>
</template>
