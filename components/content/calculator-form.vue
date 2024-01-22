<script setup>
const { t } = useI18n()

const type = ref('T')
const price = ref(1000)
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
const percentSum = computed(() => brutoSum.value * percent.value / 100)

const brutoSum = computed(() => {
  if (type.value === 'T') {
    return (price.value - fee.value - addonSum.value) / 1.2652
  } else {
    return price.value - fee.value - addonSum.value
  }
})

const taxSum = computed(() => {
  if (type.value === 'T') {
    return brutoSum.value * 0.0079 + brutoSum.value * 0.0715
  } else {
    return brutoSum.value * 0.0116 + brutoSum.value * 0.0027
  }
})

const netoSum = computed(() => {
  if (type.value === 'T') {
    return brutoSum.value - percentSum.value - taxSum.value
  } else {
    return brutoSum.value - percentSum.value - taxSum.value
  }
})

const sum = computed(() => Math.round((netoSum.value + addonSum.value) * 100) / 100)

function checkValues () {
  if (price.value === '' || price.value < 1000) price.value = 1000
  if (percent.value === '' || percent.value < 0) percent.value = 0
  if (fullDay.value === '' || fullDay.value < 0) fullDay.value = 0
  if (partialDay.value === '' || partialDay.value < 0) partialDay.value = 0
  if (meal.value === '' || meal.value < 0) meal.value = 0
  if (km.value === '' || km.value < 0) km.value = 0
  if (sum.value === '' || sum.value < 0) sum.value = 0
}
</script>

<template>
  <form
    action="/api/send.php"
    class="my-8 grid grid-cols-1 md:grid-cols-2 gap-8"
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
        min="1000"
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
    <div class="p-8 border border-slate-200 flex flex-col justify-center items-center">
      <template v-if="brutoSum > 0">
        <div class="text-center text-2xl text-purple-500 text-bold uppercase">
          {{ t('formCalculatorSum') }}
        </div>
        <div class="text-center text-[3rem] text-purple-900 font-extrabold">
          {{ sum.toLocaleString('et', { minimumFractionDigits: 2 }) }}
          <span class="text-purple-500 font-normal">€</span>
        </div>
      </template>
      <div
        v-else
        class="text-center text-xl text-red-700 text-bold"
      >
        {{ t('formCalculatorError') }}
      </div>
    </div>
  </form>
</template>
