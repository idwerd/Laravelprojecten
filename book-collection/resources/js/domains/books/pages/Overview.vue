<script setup>
    import { onMounted } from 'vue';
    import { fetchBooks, getAllBooks, deleteBook } from '../store';
    import { storeModuleFactory } from '../../../../services/store';

    // hier maken we een store aan voor boeken
    const bookStore = storeModuleFactory('books');

    // hier roepen we de getAll functie aan om alle boeken op te halen,
    // je kunt dit controleren in de network tab van de browser
    bookStore.actions.getAll();

    // hier halen we alle boeken op uit de store
    const books = bookStore.getters.all;

    //fetchBooks();
</script>


<template>
    <table>
        <tr>
            <th>Title</th>
            <th>Summary</th>
        </tr>
        <tr v-for="book in books" :key="book.id">
            <td>{{ book.title }}</td>
            <td>{{ book.summary }}</td>
            <td><router-link :to="{ name: 'books.edit', params: { id: book.id } }">Bewerk</router-link></td>
            <td><button @click="deleteBook(book.id)">Verwijder</button></td>
        </tr>
    </table>
</template>