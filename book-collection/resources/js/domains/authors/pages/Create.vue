<script setup>
import Form from '../components/Form.vue';
import { ref, computed } from 'vue';
import { createAuthor } from '../store';
import { useRouter } from 'vue-router';

const router = useRouter();

const author = ref({
    name: '',
});

const handleSubmit = async (data) => {
    await createAuthor(data);
    router.push({name: 'authors.overview'});
};
</script>

<template>

    <div>
        <h2>Nieuwe auteur toevoegen</h2>
        <Form :author="author" @submit="handleSubmit" />
    </div>

</template>