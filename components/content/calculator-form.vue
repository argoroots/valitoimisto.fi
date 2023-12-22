<script setup>
const type = ref('K')
const price = ref(1000)
const percent = ref(0)
const fullDay = ref(0)
const partialDay = ref(0)
const meal = ref(0)
const km = ref(0)

const typeOptions = ref([
  'Kergettevõtja',
  'Töötaja'
])

const fullDaySum = computed(() => fullDay.value * 48)
const partialDaySum = computed(() => partialDay.value * 22)
const mealSum = computed(() => meal.value * 12)
const kmSum = computed(() => km.value * 0.53)
const addonSum = computed(() => fullDaySum.value + partialDaySum.value + mealSum.value + kmSum.value)

const fee = computed(() => price.value * 0.04)
const netoSum = computed(() => price.value - fee.value)
const brutoSum = computed(() => netoSum.value - addonSum.value)
const percentSum = computed(() => brutoSum.value * percent.value / 100)
const sum = computed(() => brutoSum.value + addonSum.value - percentSum.value)

function checkValues () {
  if (price.value === '') price.value = 0
  if (percent.value === '') percent.value = 0
  if (fullDay.value === '') fullDay.value = 0
  if (partialDay.value === '') partialDay.value = 0
  if (meal.value === '') meal.value = 0
  if (km.value === '') km.value = 0
  if (sum.value === '') sum.value = 0

  console.log('fullDaySum', fullDaySum.value)
  console.log('partialDaySum', partialDaySum.value)
  console.log('mealSum', mealSum.value)
  console.log('kmSum', kmSum.value)
  console.log('addonSum', addonSum.value)

  console.log('fee', fee.value)
  console.log('netoSum', netoSum.value)
  console.log('brutoSum', brutoSum.value)
  console.log('percentSum', percentSum.value)
  console.log('sum', sum.value)
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
        label="Tüüp"
        required
        type="select"
        :options="typeOptions"
      />

      <form-input
        id="price"
        v-model="price"
        label="Töö hind kokku mis summas arve esitada"
        type="number"
        @blur="checkValues"
      />

      <form-input
        id="percent"
        v-model="percent"
        label="Ennakkovero prosentti"
        type="number"
        @blur="checkValues"
      />

      <form-input
        id="full-day-allowance"
        v-model="fullDay"
        label="Kokopäiväraha (48,00€)"
        type="number"
        @blur="checkValues"
      />
      <form-input
        id="partial-day-allowance"
        v-model="partialDay"
        label="Osapäiväraha (22,00€)"
        type="number"
        @blur="checkValues"
      />
      <form-input
        id="meal-compensation"
        v-model="meal"
        label="Aterikorvaus (12,00€)"
        type="number"
        @blur="checkValues"
      />
      <form-input
        id="km"
        v-model="km"
        label="Kilometrikorvaus (0,53€ / km)"
        type="number"
        @blur="checkValues"
      />
    </div>
    <div class="p-8 border border-slate-200 flex flex-col justify-center items-center">
      <div class="text-center text-2xl text-purple-500 text-bold uppercase">
        Tasu kontole
      </div>
      <div class="text-center text-[3rem] text-purple-900 font-extrabold">
        {{ sum.toLocaleString('et', { minimumFractionDigits: 2 }) }}
        <span class="text-purple-500 font-normal">€</span>
      </div>
    </div>
  </form>
</template>
