<script setup>
    import { onMounted } from 'vue';
    import { fetchAuthors, getAllAuthors, deleteAuthor } from '../store';
    import { getMessage } from '../../../../services/error';
    fetchAuthors();
</script>


<template>
    <table>
        <tr>
            <th>Auteur</th>
        </tr>
        <div v-if="getMessage">
            {{ getMessage }}
        </div>
        <ErrorMessage />
        <tr v-for="author in getAllAuthors" :key="author.id">
            <td>{{ author.name }}</td>
            <td><router-link :to="{ name: 'authors.edit', params: { id: author.id } }">Bewerk</router-link></td>
            <td><button @click="deleteAuthor(author.id)">Verwijder</button></td>
        </tr>
    </table>
</template>