import en from './locales/en.js'
import et from './locales/et.js'
import fi from './locales/fi.js'

export default defineI18nConfig(() => ({
  defaultLocale: 'et',
  fallbackLocale: 'et',
  legacy: false,
  locale: 'et',
  locales: ['en', 'et', 'fi'],
  messages: {
    en,
    et,
    fi
  }
}))
