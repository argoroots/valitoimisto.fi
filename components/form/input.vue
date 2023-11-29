<!-- eslint-disable vue/multi-word-component-names -->
<script setup>
const props = defineProps({
  modelValue: { type: String, default: '' },
  id: { type: String, required: true },
  label: { type: String, required: true },
  type: { type: String, default: 'text' },
  autofocus: { type: Boolean, default: false },
  rows: { type: Number, default: 3 }
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
</script>

<template>
  <div class="form-input">
    <textarea
      v-if="type === 'textarea'"
      :id="id"
      v-model="text"
      class="peer"
      :autofocus="autofocus"
      :placeholder="label"
      :rows="rows"
      :type="type"
      @blur="emit('blur')"
      @keypress.enter="emit('submit')"
    />
    <input
      v-else
      :id="id"
      v-model="text"
      class="peer"
      :autofocus="autofocus"
      :placeholder="label"
      :type="type"
      @blur="emit('blur')"
      @keypress.enter="emit('submit')"
    >
    <label :for="id">{{ label }}</label>
  </div>
</template>

<style scoped>
.form-input {
    @apply relative;
}

input {
    @apply h-10;
}

input, textarea {
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
