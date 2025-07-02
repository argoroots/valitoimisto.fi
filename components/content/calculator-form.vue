<script setup>
const { t } = useI18n()

// Rate constants
const FEE_RATE = 4 // Meie teenustasu
const FULL_DAY_RATE = 53 // Täispäevaraha
const PARTIAL_DAY_RATE = 24 // Osapäevaraha
const MEAL_RATE = 13.25 // Toidukompensatsioon
const KM_RATE = 0.59 // Kilomeetripõhine kompensatsioon

// Tööandja maksud
const MUNICIPAL_TAX_RATE = 1.87 // Sotsiaalkindlustus
const PENSION_CONTRIBUTION_RATE = 18.40 // Pensionikindlustus
const ACCIDENT_INSURANCE_RATE = 5.00 // Õnnetusjuhtumi- ja vastutuskindlustus
const UNEMPLOYMENT_INSURANCE_RATE = 0.20 // Töötuskindlustus
const GROUP_LIFE_INSURANCE_RATE = 0.07 // Grupielukindlustus

// Töötaja maksud
const UNEMPLOYMENT_INSURANCE_PERSONAL_RATE = 0.79 // Töötuskindlustus
const PENSION_CONTRIBUTION_PERSONAL_RATE = 7.15 // Kogumispension

// Sisestatavad väärtused
const price = ref(1000) // Arve summa ilma käibemaksuta
const percent = ref(0) // Tulumaksu protsent
const fullDay = ref(0) // Täispäevaraha
const partialDay = ref(0)
const meal = ref(0) // Toidukompensatsioon
const km = ref(0) // Kilomeetripõhine kompensatsioon

const fee = computed(() => price.value * FEE_RATE / 100) // Meie teenustasu
const priceWithoutFee = computed(() => price.value - fee.value) // Palgaks teha

// Maksuvabad lisad
const fullDaySum = computed(() => fullDay.value * FULL_DAY_RATE) // Täispäevaraha
const partialDaySum = computed(() => partialDay.value * PARTIAL_DAY_RATE) // Osapäevaraha
const mealSum = computed(() => meal.value * MEAL_RATE) // Toidukompensatsioon
const kmSum = computed(() => km.value * KM_RATE) // Kilomeetripõhine kompensatsioon
const addonSum = computed(() => fullDaySum.value + partialDaySum.value + mealSum.value + kmSum.value) // Lisatasud kokku

// Tööandja maksud brutopalgast
const municipalTax = computed(() => priceWithoutFee.value * MUNICIPAL_TAX_RATE / 100) // Sotsiaalkindlustus
const pensionContribution = computed(() => priceWithoutFee.value * PENSION_CONTRIBUTION_RATE / 100) // Pensionikindlustus
const accidentInsurance = computed(() => priceWithoutFee.value * ACCIDENT_INSURANCE_RATE / 100) // Õnnetusjuhtumi- ja vastutuskindlustus
const unemploymentInsurance = computed(() => priceWithoutFee.value * UNEMPLOYMENT_INSURANCE_RATE / 100) // Töötuskindlustus
const groupLifeInsurance = computed(() => priceWithoutFee.value * GROUP_LIFE_INSURANCE_RATE / 100) // Grupielukindlustus
const taxesSum = computed(() => municipalTax.value + pensionContribution.value + accidentInsurance.value + unemploymentInsurance.value + groupLifeInsurance.value)

// Bruto summa
const brutoSum = computed(() => priceWithoutFee.value - taxesSum.value)

// Töölise maksud brutopalgast
const unemploymentInsurancePersonal = computed(() => brutoSum.value * UNEMPLOYMENT_INSURANCE_PERSONAL_RATE / 100) // Töötuskindlustus
const pensionContributionPersonal = computed(() => brutoSum.value * PENSION_CONTRIBUTION_PERSONAL_RATE / 100) // Kogumispension
const incomeTax = computed(() => brutoSum.value * percent.value / 100) // Tulumaks
const personalTaxesSum = computed(() => unemploymentInsurancePersonal.value + pensionContributionPersonal.value + incomeTax.value)

// Brutopalk - töölise maksud
const netoSum = computed(() => brutoSum.value - personalTaxesSum.value - taxesSum.value + addonSum.value)

const sum = computed(() => Math.round(netoSum.value * 100) / 100)

function checkValues () {
  if (price.value === '' || price.value < 500) price.value = 500
  if (percent.value === '' || percent.value < 0) percent.value = 0
  if (fullDay.value === '' || fullDay.value < 0) fullDay.value = 0
  if (partialDay.value === '' || partialDay.value < 0) partialDay.value = 0
  if (meal.value === '' || meal.value < 0) meal.value = 0
  if (km.value === '' || km.value < 0) km.value = 0
}
</script>

<template>
  <form
    action="/api/send.php"
    class="my-8 grid grid-cols-1 gap-8 md:grid-cols-2"
    method="POST"
  >
    <div class="flex flex-col gap-6">
      <form-input
        id="price"
        v-model="price"
        :label="t('formPrice')"
        min="500"
        type="number"
        @blur="checkValues"
      />

      <form-input
        id="percent"
        v-model="percent"
        :label="t('formPercent')"
        min="0"
        type="number"
        @blur="checkValues"
      />

      <form-input
        id="full-day-allowance"
        v-model="fullDay"
        :label="t('formAllowanceFullDay', { rate: FULL_DAY_RATE })"
        min="0"
        type="number"
        @blur="checkValues"
      />
      <form-input
        id="partial-day-allowance"
        v-model="partialDay"
        :label="t('formAllowancePartialDay', { rate: PARTIAL_DAY_RATE })"
        min="0"
        type="number"
        @blur="checkValues"
      />
      <form-input
        id="meal-compensation"
        v-model="meal"
        :label="t('formAllowanceMeal', { rate: MEAL_RATE })"
        min="0"
        type="number"
        @blur="checkValues"
      />
      <form-input
        id="km"
        v-model="km"
        :label="t('formAllowanceKm', { rate: KM_RATE })"
        min="0"
        type="number"
        @blur="checkValues"
      />
    </div>
    <div class="flex flex-col items-center justify-center border border-slate-200 p-8">
      <template v-if="brutoSum > 0">
        <!-- Breakdown fields -->
        <div class="mb-6 w-full space-y-4">
          <!-- Brutopalk -->
          <div class="flex justify-between pb-2 text-sm">
            <span class="font-semibold">{{ t('calcGrossSalary') }}:</span>
            <span class="font-medium">{{ (Math.round(brutoSum * 100) / 100).toLocaleString('et', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}€</span>
          </div>

          <!-- Tööandja maksud -->
          <div class="space-y-1">
            <div class="text-xs font-semibold uppercase text-gray-600">
              {{ t('calcEmployerTaxes') }}:
            </div>
            <div class="flex justify-between pl-2 text-sm">
              <span>{{ t('calcPensionInsurance', { rate: PENSION_CONTRIBUTION_RATE }) }}:</span>
              <span class="font-medium">{{ (Math.round(pensionContribution * 100) / 100).toLocaleString('et', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}€</span>
            </div>
            <div class="flex justify-between pl-2 text-sm">
              <span>{{ t('calcSocialTax', { rate: MUNICIPAL_TAX_RATE }) }}:</span>
              <span class="font-medium">{{ (Math.round(municipalTax * 100) / 100).toLocaleString('et', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}€</span>
            </div>
            <div class="flex justify-between pl-2 text-sm">
              <span>{{ t('calcUnemploymentInsurance', { rate: UNEMPLOYMENT_INSURANCE_RATE }) }}:</span>
              <span class="font-medium">{{ (Math.round(unemploymentInsurance * 100) / 100).toLocaleString('et', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}€</span>
            </div>
            <div class="flex justify-between pl-2 text-sm">
              <span>{{ t('calcAccidentInsurance', { rate: ACCIDENT_INSURANCE_RATE }) }}:</span>
              <span class="font-medium">{{ (Math.round(accidentInsurance * 100) / 100).toLocaleString('et', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}€</span>
            </div>
            <div class="flex justify-between pl-2 text-sm">
              <span>{{ t('calcGroupLifeInsurance', { rate: GROUP_LIFE_INSURANCE_RATE }) }}:</span>
              <span class="font-medium">{{ (Math.round(groupLifeInsurance * 100) / 100).toLocaleString('et', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}€</span>
            </div>
          </div>

          <!-- Töötaja maksud -->
          <div class="space-y-1">
            <div class="text-xs font-semibold uppercase text-gray-600">
              {{ t('calcEmployeeTaxes') }}:
            </div>
            <div class="flex justify-between pl-2 text-sm">
              <span>{{ t('calcIncomeTax', { percent }) }}:</span>
              <span class="font-medium">{{ (Math.round(incomeTax * 100) / 100).toLocaleString('et', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}€</span>
            </div>
            <div class="flex justify-between pl-2 text-sm">
              <span>{{ t('calcFundedPension', { rate: PENSION_CONTRIBUTION_PERSONAL_RATE }) }}:</span>
              <span class="font-medium">{{ (Math.round(pensionContributionPersonal * 100) / 100).toLocaleString('et', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}€</span>
            </div>
            <div class="flex justify-between pl-2 text-sm">
              <span>{{ t('calcUnemploymentInsurancePersonal', { rate: UNEMPLOYMENT_INSURANCE_PERSONAL_RATE }) }}:</span>
              <span class="font-medium">{{ (Math.round(unemploymentInsurancePersonal * 100) / 100).toLocaleString('et', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}€</span>
            </div>
          </div>

          <!-- Maksuvabad lisad -->
          <div class="space-y-1">
            <div class="text-xs font-semibold uppercase text-gray-600">
              {{ t('calcTaxFreeAllowances') }}:
            </div>
            <div class="flex justify-between pl-2 text-sm">
              <span>{{ t('calcFullDayAllowances', { count: fullDay, rate: FULL_DAY_RATE }) }}:</span>
              <span class="font-medium">{{ (Math.round(fullDaySum * 100) / 100).toLocaleString('et', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}€</span>
            </div>
            <div class="flex justify-between pl-2 text-sm">
              <span>{{ t('calcPartialDayAllowances', { count: partialDay, rate: PARTIAL_DAY_RATE }) }}:</span>
              <span class="font-medium">{{ (Math.round(partialDaySum * 100) / 100).toLocaleString('et', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}€</span>
            </div>
            <div class="flex justify-between pl-2 text-sm">
              <span>{{ t('calcMealAllowance', { count: meal, rate: MEAL_RATE }) }}:</span>
              <span class="font-medium">{{ (Math.round(mealSum * 100) / 100).toLocaleString('et', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}€</span>
            </div>
            <div class="flex justify-between pl-2 text-sm">
              <span>{{ t('calcKilometerAllowance', { count: km, rate: KM_RATE }) }}:</span>
              <span class="font-medium">{{ (Math.round(kmSum * 100) / 100).toLocaleString('et', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}€</span>
            </div>
          </div>
        </div>

        <div class="mb-4 w-full border-t border-gray-300" />

        <div class="text-center text-lg font-bold uppercase text-purple-500">
          {{ t('formCalculatorSum') }}
        </div>
        <div class="text-center text-4xl font-extrabold text-purple-900">
          {{ sum.toLocaleString('et', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}
          <span class="font-normal text-purple-500">€</span>
        </div>
      </template>
      <div
        v-else
        class="text-center text-xl font-bold text-red-700"
      >
        {{ t('formCalculatorError') }}
      </div>
    </div>
  </form>
</template>
