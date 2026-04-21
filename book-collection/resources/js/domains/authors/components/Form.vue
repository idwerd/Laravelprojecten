<script setup>
    import { ref } from 'vue';
    import { fetchAuthors, getAllAuthors } from '../../authors/store';

    // Fetch authors when component is mounted
    fetchAuthors();

    const props = defineProps({ author: Object });

    const emit = defineEmits(['submit']);

    const form = ref({ ...props.author });

    const handleSubmit = () => emit('submit', form.value);
</script>

<template>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <form @submit.prevent="handleSubmit">
        <label>Naam:</label>
        <input v-model="form.name" type="text" required />

        <button type="submit">Opslaan</button>
    </form>
</template>
