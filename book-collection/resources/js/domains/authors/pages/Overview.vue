<script setup>
    import { onMounted } from 'vue';
    import { fetchAuthors, getAllAuthors } from '../store';

    fetchAuthors();
</script>


<template>
    <table>
        <tr>
            <th>Auteur</th>
        </tr>
        <tr v-for="author in getAllAuthors" :key="author.id">
            <td>{{ author.name }}</td>
            <td><router-link :to="{ name: 'authors.edit', params: { id: author.id } }">Bewerk</router-link></td>
        </tr>
    </table>
</template>