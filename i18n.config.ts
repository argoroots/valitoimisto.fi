import en from './locales/en.js'
import et from './locales/et.js'
import fi from './locales/fi.js'
import ru from './locales/ru.js'

export default defineI18nConfig(() => ({
  defaultLocale: 'et',
  fallbackLocale: 'et',
  legacy: false,
  locale: 'et',
  locales: ['en', 'et', 'fi', 'ru'],
  messages: {
    en,
    et,
    fi,
    ru
  }
}))
