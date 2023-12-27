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
    documentDriven: true,
    markdown: {
      anchorLinks: false
    }
  },
  css: ['~/assets/css/main.css'],
  devtools: { enabled: true },
  i18n: {
    vueI18n: './i18n.config.ts'
  },
  modules: ['@nuxt/content'],
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {}
    }
  }
})
