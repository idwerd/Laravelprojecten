<script setup>
    import { onMounted } from 'vue';
    import { fetchBooks, getAllBooks, deleteBook } from '../store';

    fetchBooks();
</script>


<template>
    <table>
        <tr>
            <th>Title</th>
            <th>Summary</th>
        </tr>
        <tr v-for="book in getAllBooks" :key="book.id">
            <td><router-link :to="{ name: 'books.show', params: { id: book.id } }">{{ book.title }}</router-link></td>
            <td>{{ book.summary }}</td>
            <td><router-link :to="{ name: 'books.edit', params: { id: book.id } }">Bewerk</router-link></td>
            <td><button @click="deleteBook(book.id)">Verwijder</button></td>
        </tr>
    </table>
</template>