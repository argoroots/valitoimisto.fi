<!-- eslint-disable vue/multi-word-component-names -->
<script setup>
import { marked } from 'marked'
import { InformationCircleIcon } from '@heroicons/vue/24/outline'

const props = defineProps({
  modelValue: { type: [String, Number], default: '' },
  id: { type: String, required: true },
  label: { type: String, required: true },
  type: { type: String, default: 'text' },
  autofocus: { type: Boolean, default: false },
  rows: { type: Number, default: 3 },
  options: { type: Array, default: () => [] },
  info: { type: String, default: '' },
  min: { type: [String, Number], default: '' },
  max: { type: [String, Number], default: '' },
  accept: { type: String, default: '' },
  required: { type: Boolean, default: false }
})

const emit = defineEmits([
  'update:modelValue',
  'submit',
  'blur'
])

const text = computed({
  get () {
    return props.modelValue
  },
  set (val) {
    emit('update:modelValue', val)
  }
})

const infoHtml = computed(() => marked.parse(props.info || ''))
</script>

<template>
  <div class="form-input">
    <textarea
      v-if="type === 'textarea'"
      :id="id"
      v-model="text"
      class="peer"
      :autofocus="autofocus"
      :name="id"
      :placeholder="label"
      :required="required"
      :rows="rows"
      @blur="emit('blur')"
    />

    <select
      v-else-if="type === 'select'"
      :id="id"
      v-model="text"
      class="peer"
      :autofocus="autofocus"
      :name="id"
      :placeholder="label"
      :required="required"
      :type="type"
      @blur="emit('blur')"
    >
      <option
        v-for="o in options"
        :key="o.value"
        :selected="o.value === modelValue"
        :value="o.value"
      >
        {{ o.label }}
      </option>
    </select>

    <input
      v-else
      :id="id"
      v-model="text"
      class="peer"
      :accept="accept"
      :autofocus="autofocus"
      :max="max"
      :min="min"
      :name="id"
      :placeholder="label"
      :required="required"
      :type="type"
      @blur="emit('blur')"
    >
    <label :for="id">{{ required ? `${label} *` : label }}</label>
    <div
      v-if="info"
      class="mt-2 text-xs inline-flex text-slate-700"
    >
      <InformationCircleIcon class="size-4 mr-1" aria-hidden="true" />
      <span v-html="infoHtml" />
    </div>
  </div>
</template>

<style scoped>
.form-input {
  @apply relative;
}

input, select {
  @apply h-10;
}

input[type="file"] {
  @apply h-auto;
  @apply p-3;
  @apply text-sm;
  @apply bg-white;
}

input, select, textarea {
  @apply w-full;
  @apply px-2;
  @apply placeholder-transparent;
  @apply border;
  @apply rounded-sm;
  @apply border-slate-300;
  @apply font-light;
  @apply text-slate-900;
  @apply focus:outline-none;
  @apply focus:border-purple-900;
}

label {
  @apply absolute;
  @apply -top-2.5;
  @apply left-2;
  @apply px-2;
  @apply text-sm;
  @apply text-slate-500;
  @apply tracking-wide;
  @apply transition-all;
  @apply bg-gradient-to-b from-slate-50 to-white;

  @apply peer-placeholder-shown:top-2;
  @apply peer-placeholder-shown:text-base;
  @apply peer-placeholder-shown:text-slate-500;
  @apply peer-placeholder-shown:cursor-text;
  @apply peer-placeholder-shown:bg-white;
  @apply peer-placeholder-shown:bg-none;

  @apply peer-focus:-top-2.5;
  @apply peer-focus:text-sm;
  @apply peer-focus:text-purple-900;
  @apply peer-focus:bg-gradient-to-b from-slate-50 via-white to-white;
  @apply peer-focus:font-semibold;
}
</style>
