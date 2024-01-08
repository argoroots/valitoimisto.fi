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
    },
    navigation: {
      fields: ['paths']
    }
  },
  css: ['~/assets/css/main.css'],
  devtools: { enabled: true },
  i18n: {
    defaultLocale: 'et',
    lazy: true,
    langDir: 'locales',
    locales: [
      {
        code: 'en',
        name: 'English',
        file: 'en.js'
      },
      {
        code: 'et',
        name: 'Eesti keel',
        file: 'et.js'
      },
      {
        code: 'fi',
        name: 'Suomi',
        file: 'fi.js'
      }
    ]
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
  routeRules: {
    '/': { redirect: '/et' }
  }
})
