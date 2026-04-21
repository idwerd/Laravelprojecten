<script setup>
    import { ref } from 'vue';
    import { fetchAuthors, getAllAuthors } from '../../authors/store';

    // Fetch authors when component is mounted
    fetchAuthors();

    const props = defineProps({ book: Object });

    const emit = defineEmits(['submit']);

    const form = ref({ ...props.book });

    const handleSubmit = () => emit('submit', form.value);
</script>

<template>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <form @submit.prevent="handleSubmit">
        <label>Titel:</label>
        <input v-model="form.title" type="text" required />

        <label>Samenvatting:</label>
        <textarea v-model="form.summary" required></textarea>

        <label>Auteur:</label>
        <select v-model="form.author_id" required>
            <option v-for="author in getAllAuthors" :key="author.id" :value="author.id">
                {{ author.name }}
            </option>
        </select>

        <button type="submit">Opslaan</button>
    </form>
</template>
