<script setup>
const route = useRoute()
const { t } = useI18n()

const formRef = ref()
const typeOptions = ref([
  { value: t('formTypeEmployee'), label: t('formTypeEmployee') },
  { value: t('formTypeLightEntrepreneur'), label: t('formTypeLightEntrepreneur') }
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
        {{ t('formInvoiceRecipient') }}
      </h3>

      <form-input
        id="company-name"
        autofocus
        :label="t('formCompanyName')"
        required
      />
      <form-input
        id="company-y"
        :label="t('formCompanyY')"
        required
      />
      <form-input
        id="ocject-number"
        :label="t('formObjectNumberAddress')"
      />
      <form-input
        id="description"
        :label="t('formJobDescription')"
        required
      />
      <form-input
        id="price"
        :label="t('formPrice')"
        min="500"
        required
        type="number"
        :info="t('formPriceInfo')"
      />
      <form-input
        id="payment-term"
        :label="t('formPaymentDeadlineInDays')"
        min="0"
        required
        type="number"
      />
      <form-input
        id="full-day-allowance"
        :label="t('formAllowanceFullDay')"
        min="0"
        type="number"
        value="0"
      />
      <form-input
        id="partial-day-allowance"
        :label="t('formAllowancePartialDay')"
        min="0"
        type="number"
      />
      <form-input
        id="meal-compensation"
        :label="t('formAllowanceMeal')"
        min="0"
        type="number"
      />
      <form-input
        id="km"
        :label="t('formAllowanceKm')"
        min="0"
        type="number"
      />

      <h3 class="text-xl font-bold text-purple-800">
        {{ t('formPayroll') }}
      </h3>

      <form-input
        id="payrollStart"
        :label="t('formPayrollStart')"
        required
        type="date"
      />
      <form-input
        id="payrollEnd"
        :label="t('formPayrollEnd')"
        required
        type="date"
      />
    </div>

    <div class="flex flex-col gap-6">
      <h3 class="text-xl font-bold text-purple-800">
        {{ t('formSalaryRecipient') }}
      </h3>

      <form-input
        id="type"
        autofocus
        :label="t('formType')"
        required
        type="select"
        :options="typeOptions"
        :model-value="typeOptions.at(0).value"
      />
      <form-input
        id="first-name"
        :label="t('formFirstName')"
        required
      />
      <form-input
        id="last-name"
        :label="t('formLastName')"
        required
      />
      <form-input
        id="e-mail"
        :label="t('formEmail')"
        type="email"
        required
      />
      <form-input
        id="phone"
        :label="t('formPhone')"
        required
        type="tel"
      />
      <form-input
        id="address"
        :label="t('formAddress')"
        required
      />
      <form-input
        id="vero-number"
        :label="t('formTaxNumber')"
        required
      />
      <form-input
        id="id-number"
        :label="t('formPersonIdc')"
        required
      />
      <form-input
        id="iban"
        :label="t('formBankIBAN')"
        required
      />
      <form-input
        id="bic"
        :label="t('formBankBIC')"
        required
      />
      <form-input
        id="file-vero"
        accept="application/pdf"
        :label="t('formTaxCertificate')"
        required
        type="file"
        :info="t('formTaxCertificateInfo')"
      />
      <form-input
        id="file-kuluauanne"
        :label="t('formExpenseReport')"
        type="file"
        :info="t('formExpenseReportInfo')"
      />
      <form-input
        id="info"
        :label="t('formOtherInfo')"
        type="textarea"
        :rows="5"
      />
    </div>

    <div class="col-span-full text-center">
      <form-button class="md:max-w-lg" type="submit">
        {{ t('formSend') }}
      </form-button>
    </div>
  </form>

  <div
    v-if="isSubmitted"
    class="mt-28 flex flex-col items-center justify-center gap-2"
  >
    <h2 class="text-2xl font-bold text-purple-800">
      {{ t('formSuccess') }}
    </h2>
    <p class="text-lg text-center">
      {{ t('formSuccessMessage') }}
    </p>
  </div>

  <div
    v-if="isError"
    class="mt-28 flex flex-col items-center justify-center gap-2"
  >
    <h2 class="text-2xl font-bold text-red-800">
      {{ t('formError') }}
    </h2>
    <p class="text-lg text-center">
      {{ t('formErrorMessage') }}
    </p>
  </div>
</template>
