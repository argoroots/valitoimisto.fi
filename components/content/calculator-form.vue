<script setup>

</script>

<template>
  <form
    action="/api/send.php"
    class="my-8 mx-auto max-w-md flex flex-col gap-8"
    method="POST"
  >
    <div class="flex flex-col gap-6">
      <form-input
        id="price"
        label="Töö hind kokku mis summas arve esitada"
      />

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
  </form>
</template>
