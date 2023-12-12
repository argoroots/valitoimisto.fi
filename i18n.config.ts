export default defineI18nConfig(() => ({
  defaultLocale: 'et',
  legacy: false,
  locale: 'et',
  locales: ['en', 'et'],
  fallbackLocale: 'et',
  strategy: 'prefix_except_default'
}))
