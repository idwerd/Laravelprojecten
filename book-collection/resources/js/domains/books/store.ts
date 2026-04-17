import axios from 'axios';
import { ref, computed } from 'vue';

// state
const books = ref([]);

// getters
export const getAllBooks = computed(() => books.value);
export const getBookById = (id) => computed(() => books.value.find(book => book.id == id));

// actions
export const fetchBooks = async () => {
    const {data} = await axios.get('/api/books');
    if(!data) return
    books.value = data;
};

export const createBook = async (newBook) => {
    const {data} = await axios.post('/api/books', newBook);
    if(!data) return
    books.value = data;
};

export const updateBook = async (id, updatedBook) => {
    const { data } = await axios.put(`/api/books/${id}`, updatedBook);
    if (!data) return;
    books.value = data;
};

export const deleteBook = async (id) => {
    await axios.delete(`/api/books/${id}`);
    books.value = books.value.filter(book => book.id !== id);
};