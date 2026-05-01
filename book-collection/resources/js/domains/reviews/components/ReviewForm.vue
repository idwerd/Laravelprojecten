<script setup>
    import { ref } from 'vue';
    import { fetchAuthors, getAllAuthors } from '../../authors/store';

    // Fetch authors when component is mounted
    fetchAuthors();

    const props = defineProps({ review: Object });

    const emit = defineEmits(['submit']);

    const form = ref({ ...props.review });

    const handleSubmit = () => emit('submit', form.value);
</script>

<template>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <form @submit.prevent="handleSubmit">
        <label>Review:</label>
        <textarea v-model="form.body" type="text" required></textarea>
    
        <button type="submit">Plaatsen</button>
    </form>
</template>
