import axios from 'axios';
import { ref, computed } from 'vue';
import { getRequest, postRequest, putRequest, deleteRequest } from '../../../services/http';
import { storeModuleFactory } from '../../../services/store';

const bookStore = storeModuleFactory('books');
bookStore.actions.getAll();

// getters
export const getAllBooks = bookStore.getters.all;
export const getBookById = bookStore.getters.getById;

// actions
export const fetchBooks = async () => {
    await bookStore.actions.getAll();
};

export const addBook = async (data) => {
    await bookStore.actions.create(data);
    // code...
};

export const updateBook = async (id, data) => {
    await bookStore.actions.update(id, data);
    // code...
};

export const deleteBook = async (id) => {
    await bookStore.actions.delete(id);
    // code...
};