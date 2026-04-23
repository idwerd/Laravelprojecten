import axios from 'axios';
import { ref, computed } from 'vue';
import { deleteRequest } from '../../../services/http';
import { storeModuleFactory } from '../../../services/store';
// state
const authors = ref([]);

export interface Author {
    name: string;
}

const authorStore = storeModuleFactory('authors');
authorStore.actions.getAll();

// getters
export const getAllAuthors = authorStore.getters.all;
export const getAuthorById = authorStore.getters.getById;

// actions
export const fetchAuthors = async () => {
    await authorStore.actions.getAll();
}


export const addAuthor = async (newAuthor) => {
    await authorStore.actions.create(newAuthor);
}

export const updateAuthor = async (id, updatedAuthor) => {
    await authorStore.actions.update(id, updatedAuthor);
};

export const deleteAuthor = async (id) => {
    const response = await deleteRequest(`/authors/${id}`);
    if (response.data.message === 403) {
        alert(response.data.message);
    }
    await authorStore.actions.delete(id);
};