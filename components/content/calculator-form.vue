<script setup>
const { t } = useI18n()

const type = ref('T')
const price = ref(500)
const percent = ref(0)
const fullDay = ref(0)
const partialDay = ref(0)
const meal = ref(0)
const km = ref(0)

const typeOptions = ref([
  { value: 'T', label: t('formTypeEmployee') },
  { value: 'K', label: t('formTypeLightEntrepreneur') }
])

const fee = computed(() => price.value * 0.04)
const fullDaySum = computed(() => fullDay.value * 51)
const partialDaySum = computed(() => partialDay.value * 24)
const mealSum = computed(() => meal.value * 12.75)
const kmSum = computed(() => km.value * 0.57)
const addonSum = computed(() => fullDaySum.value + partialDaySum.value + mealSum.value + kmSum.value)
const brutoSum = computed(() => price.value - fee.value - addonSum.value)

const netoSum = computed(() => {
  const bruto = brutoSum.value * (1 - 0.248)
  const taxSum = bruto * 0.0794
  const percentSum = bruto * 0.145

  // console.log('fee', fee.value)
  // console.log('fullDaySum', fullDaySum.value)
  // console.log('partialDaySum', partialDaySum.value)
  // console.log('mealSum', mealSum.value)
  // console.log('kmSum', kmSum.value)
  // console.log('addonSum', addonSum.value)
  // console.log('taxSum', taxSum)
  // console.log('percentSum', percentSum)
  // console.log('brutoSum', bruto - taxSum - percentSum)

  return bruto - taxSum - percentSum
})

const sum = computed(() => Math.round((netoSum.value + addonSum.value) * 100) / 100)

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
        id="type"
        v-model="type"
        autofocus
        :label="t('formType')"
        required
        type="select"
        :options="typeOptions"
      />

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
        :label="t('formAllowanceFullDay')"
        min="0"
        type="number"
        @blur="checkValues"
      />
      <form-input
        id="partial-day-allowance"
        v-model="partialDay"
        :label="t('formAllowancePartialDay')"
        min="0"
        type="number"
        @blur="checkValues"
      />
      <form-input
        id="meal-compensation"
        v-model="meal"
        :label="t('formAllowanceMeal')"
        min="0"
        type="number"
        @blur="checkValues"
      />
      <form-input
        id="km"
        v-model="km"
        :label="t('formAllowanceKm')"
        min="0"
        type="number"
        @blur="checkValues"
      />
    </div>
    <div class="flex flex-col items-center justify-center border border-slate-200 p-8">
      <template v-if="brutoSum > 0">
        <div class="text-center text-2xl font-bold uppercase text-purple-500">
          {{ t('formCalculatorSum') }}
        </div>
        <div class="text-center text-[3rem] font-extrabold text-purple-900">
          {{ sum.toLocaleString('et', { minimumFractionDigits: 2 }) }}
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
