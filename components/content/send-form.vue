<script setup>

</script>

<template>
  <form
    action="/api/send.php"
    class="my-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
    method="POST"
  >
    <div class="flex flex-col gap-6">
      <h3 class="text-xl font-bold text-purple-800">
        Arve saaja
      </h3>

      <form-input
        id="company-name"
        autofocus
        label="Äriühingu nimi"
      />
      <form-input
        id="company-y"
        label="Äriühingu y-tunnus"
      />
      <form-input
        id="ocject-number"
        label="Objekti number/aadress"
      />
      <form-input
        id="description"
        label="Töö kirjeldus ja selgitus"
      />
      <form-input
        id="price"
        label="Töö hind kokku mis summas arve esitada"
      />
    </div>

    <div class="flex flex-col gap-6">
      <h3 class="text-xl font-bold text-purple-800">
        Palga saaja
      </h3>

      <form-input
        id="first-name"
        label="Eesnimi"
      />
      <form-input
        id="last-name"
        label="Perekonnanimi"
      />
      <form-input
        id="e-mail"
        label="E-mail"
      />
      <form-input
        id="phone"
        label="Telefoninumber"
      />
      <form-input
        id="address"
        label="Aadress"
      />
      <form-input
        id="vero-number"
        label="Veronumber"
      />
      <form-input
        id="id-number"
        label="Henkilötunnus"
      />
      <form-input
        id="iban"
        label="Panga kontonumber"
      />
      <form-input
        id="bic"
        label="Panga BIC"
      />
      <form-input
        id="info"
        label="Muu selgitus"
        type="textarea"
        :rows="5"
      />
    </div>

    <div class="flex flex-col gap-6">
      <h3 class="text-xl font-bold text-purple-800">
        ?????
      </h3>

      <form-input
        id="km"
        label="Kilometrit (0,53€ / km)"
      />
      <form-input
        id="Full-day-allowance"
        label="Kokopäiväraha (48,00€)"
      />
      <form-input
        id="partial-day-allowance"
        label="Osapäiväraha (22,00€)"
      />
      <form-input
        id="meal-compensation"
        label="Aterikorvaus (12,00€)"
      />
    </div>

    <div class="col-span-full text-center">
      <form-button class="max-w-lg" type="submit">
        Saada
      </form-button>
    </div>
  </form>
</template>
