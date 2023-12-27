<script setup>
const route = useRoute()

const formRef = ref()
const typeOptions = ref([
  { value: 'Töötaja', label: 'Töötaja' },
  { value: 'Kergettevõtja', label: 'Kergettevõtja' }
])

const isSubmitted = computed(() => route.query.result === 'ok')
const isError = computed(() => route.query.result === 'error')

function submitForm (params) {
  formRef.value.submit()
}
</script>

<template>
  <form
    v-if="!isSubmitted && !isError"
    ref="formRef"
    action="/api/send.php"
    class="my-8 grid grid-cols-1 md:grid-cols-2 gap-8"
    enctype="multipart/form-data"
    method="POST"
    @submit.prevent="submitForm"
  >
    <div class="flex flex-col gap-6">
      <h3 class="text-xl font-bold text-purple-800">
        Arve saaja
      </h3>

      <form-input
        id="company-name"
        autofocus
        label="Äriühingu nimi"
        required
      />
      <form-input
        id="company-y"
        label="Äriühingu y-tunnus"
        required
      />
      <form-input
        id="ocject-number"
        label="Objekti number/aadress"
      />
      <form-input
        id="description"
        label="Töö kirjeldus ja selgitus"
        required
      />
      <form-input
        id="price"
        label="Töö hind kokku mis summas arve esitada"
        min="1000"
        required
        type="number"
        info="Minimaalselt 1000€"
      />
      <form-input
        id="payment-term"
        label="Maksetähtaeg päevades"
        min="0"
        required
        type="number"
      />
      <form-input
        id="full-day-allowance"
        label="Kokopäiväraha (48,00€)"
        min="0"
        type="number"
        value="0"
      />
      <form-input
        id="partial-day-allowance"
        label="Osapäiväraha (22,00€)"
        min="0"
        type="number"
      />
      <form-input
        id="meal-compensation"
        label="Aterikorvaus (12,00€)"
        min="0"
        type="number"
      />
      <form-input
        id="km"
        label="Kilometrikorvaus (0,53€ / km)"
        min="0"
        type="number"
      />
    </div>

    <div class="flex flex-col gap-6">
      <h3 class="text-xl font-bold text-purple-800">
        Palga saaja
      </h3>

      <form-input
        id="type"
        autofocus
        label="Tüüp"
        required
        type="select"
        :options="typeOptions"
        :model-value="typeOptions.at(0).value"
      />
      <form-input
        id="first-name"
        label="Eesnimi"
        required
      />
      <form-input
        id="last-name"
        label="Perekonnanimi"
        required
      />
      <form-input
        id="e-mail"
        label="E-mail"
        type="email"
        required
      />
      <form-input
        id="phone"
        label="Telefoninumber"
        required
        type="tel"
      />
      <form-input
        id="address"
        label="Aadress"
        required
      />
      <form-input
        id="vero-number"
        label="Veronumber"
        required
      />
      <form-input
        id="id-number"
        label="Henkilötunnus"
        required
      />
      <form-input
        id="iban"
        label="Panga kontonumber"
        required
      />
      <form-input
        id="bic"
        label="Panga BIC"
        required
      />
      <form-input
        id="file-vero"
        accept="application/pdf"
        label="Verokaart"
        required
        type="file"
        info="PDF failina"
      />
      <form-input
        id="file-kuluauanne"
        label="Kuluauanne"
        type="file"
        info="Laadi alla [näidisfail](/doc/matkalasku-ja-kululomake.xls)"
      />
      <form-input
        id="info"
        label="Muu selgitus"
        type="textarea"
        :rows="5"
      />
    </div>

    <div class="col-span-full text-center">
      <form-button class="md:max-w-lg" type="submit">
        Saada
      </form-button>
    </div>
  </form>

  <div
    v-if="isSubmitted"
    class="mt-28 flex flex-col items-center justify-center gap-2"
  >
    <h2 class="text-2xl font-bold text-purple-800">
      Täname!
    </h2>
    <p class="text-lg text-center">
      Teie andmed on edastatud ja me võtame teiega ühendust.
    </p>
  </div>

  <div
    v-if="isError"
    class="mt-28 flex flex-col items-center justify-center gap-2"
  >
    <h2 class="text-2xl font-bold text-red-800">
      Viga!
    </h2>
    <p class="text-lg text-center">
      Teie andmete edastamisel tekkis viga. Palun proovige uuesti.
    </p>
  </div>
</template>
