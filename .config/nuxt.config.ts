// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  modules: [
    '@nuxt/eslint',
    '@nuxtjs/i18n',
    '@nuxt/content',
    '@nuxtjs/tailwindcss'
  ],
  ssr: true,
  app: {
    head: {
      htmlAttrs: { lang: 'et' },
      meta: [
        { name: 'keywords', content: 'raamatupidamine, raamatupidamisteenus, palgaarvestus, soomes, soome, majandusaaasta aruanne, kirjanpito, kirjanpitopalvelu, palkkalaskelma, tasekirja, laskutuspalvelu, arveteenus, tööjõurent, accounting, payroll, accounting service, bookkeeping, työvoimavuokraus, labor hire' }
      ],
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
  spaLoadingTemplate: false,
  future: {
    compatibilityVersion: 4
  },
  compatibilityDate: '2024-10-29',
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {}
    }
  },
  eslint: {
    config: {
      autoInit: false,
      stylistic: true
    }
  },
  i18n: {
    vueI18n: '~/.config/i18n.config.ts'
  },
  tailwindcss: {
    cssPath: '~/assets/css/main.css',
    configPath: '~/.config/tailwind.config.ts'
  }
})
