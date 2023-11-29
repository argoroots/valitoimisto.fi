<script setup>
useHead({ title: 'Saada andmed' })
</script>

<template>
  <form class="my-10 flex flex-col gap-6">
    <form-input
      id="name"
      autofocus
      label="Arve esitada äriühingule nimega"
    />
    <form-input
      id="name"
      label="Arve saaja äriühingu y-tunnus"
    />
    <form-input
      id="name"
      label="Objekti number/aadress"
    />
    <form-input
      id="name"
      label="Töö kirjeldus ja selgitus"
    />
    <form-input
      id="name"
      label="Töö hind kokku mis summas arve esitada"
    />
    <form-input
      id="name"
      label="Eesnimi"
    />
    <form-input
      id="name"
      label="Perekonnanimi"
    />
    <form-input
      id="name"
      label="E-mail"
    />
    <form-input
      id="name"
      label="Telefoninumber"
    />
    <form-input
      id="name"
      label="Aadress"
    />
    <form-input
      id="name"
      label="Veronumber"
    />
    <form-input
      id="name"
      label="Henkilötunnus"
    />
    <form-input
      id="name"
      label="Panga kontonumber"
    />
    <form-input
      id="name"
      label="Panga BIC"
    />
    <form-input
      id="name"
      label="Muu selgitus"
      rows="5"
      type="textarea"
    />
    <form-input
      id="name"
      label="Kilometrit (0,53 eur / km)"
    />
    <form-input
      id="name"
      label="Kokopäiväraha (48,00 eur)"
    />
    <form-input
      id="name"
      label="Osapäiväraha (22,00 eur)"
    />
    <form-input
      id="name"
      label="Aterikorvaus (12,oo eur)"
    />

    <form-button>Saada</form-button>
  </form>
</template>
