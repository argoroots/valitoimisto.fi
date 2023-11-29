<script setup>
useHead({ title: 'Saada andmed' })
</script>

<template>
  <form class="my-8 mx-auto max-w-md flex flex-col gap-6">
    <h2 class="mb-8 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
      Saada andmed
    </h2>
    <form-input
      id="company-name"
      autofocus
      label="Arve esitada äriühingule nimega"
    />
    <form-input
      id="company-y"
      label="Arve saaja äriühingu y-tunnus"
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
      rows="5"
      type="textarea"
    />
    <form-input
      id="km"
      label="Kilometrit (0,53 eur / km)"
    />
    <form-input
      id="Full-day-allowance"
      label="Kokopäiväraha (48,00 eur)"
    />
    <form-input
      id="partial-day-allowance"
      label="Osapäiväraha (22,00 eur)"
    />
    <form-input
      id="meal-compensation"
      label="Aterikorvaus (12,oo eur)"
    />

    <form-button>Saada</form-button>
  </form>
</template>
