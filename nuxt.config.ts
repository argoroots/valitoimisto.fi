// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  app: {
    head: {
      htmlAttrs: { lang: 'et' },
      script: [
        { src: 'https://plausible.io/js/script.js', 'data-domain': 'valitoimisto.fi', defer: true }
      ]
    }
  },
  content: {
    // defaultLocale: 'et',
    documentDriven: true,
    // locales: ['en', 'et', 'fi'],
    markdown: {
      anchorLinks: false
    }
  },
  css: ['~/assets/css/main.css'],
  i18n: {
    vueI18n: './i18n.config.ts'
  },
  modules: [
    '@nuxtjs/i18n',
    '@nuxt/content'
  ],
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {}
    }
  },
  spaLoadingTemplate: false
})
