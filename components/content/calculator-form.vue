<script setup>
const typeOptions = ref([
  'Kergettevõtja',
  'Töötaja'
])
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
        autofocus
        label="Tüüp"
        required
        type="select"
        :options="typeOptions"
        :model-value="typeOptions.at(0)"
      />

      <form-input
        id="price"
        label="Töö hind kokku mis summas arve esitada"
        type="number"
        :model-value="1000"
      />

      <form-input
        id="percent"
        label="Ennakkovero prosentti"
        type="number"
        :model-value="11"
      />

      <form-input
        id="Full-day-allowance"
        label="Kokopäiväraha (48,00€)"
        type="number"
        :model-value="0"
      />
      <form-input
        id="partial-day-allowance"
        label="Osapäiväraha (22,00€)"
        type="number"
        :model-value="0"
      />
      <form-input
        id="meal-compensation"
        label="Aterikorvaus (12,00€)"
        type="number"
        :model-value="10"
      />
      <form-input
        id="km"
        label="Kilometrikorvaus (0,53€ / km)"
        type="number"
        :model-value="0"
      />
    </div>
    <div class="p-8 border border-slate-200 flex flex-col justify-center items-center">
      <div class="text-center text-2xl text-purple-500 text-bold uppercase">
        Tasu kontole
      </div>
      <div class="text-center text-[3rem] text-purple-900 font-extrabold">
        867,60
        <span class="text-purple-500 font-normal">€</span>
      </div>
    </div>
  </form>
</template>
