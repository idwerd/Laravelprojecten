import axios from 'axios';
import { ref, computed } from 'vue';
import { getRequest, postRequest, putRequest, deleteRequest } from '../../../services/http';

// state
const authors = ref([]);

export interface Author {
    name: string;
}

// getters
export const getAllAuthors = computed(() => authors.value);
export const getAuthorById = (id) => computed(() => authors.value.find(author => author.id == id));

// actions
export const fetchAuthors = async () => {
    const {data} = await getRequest('/authors');
    if(!data) return
    authors.value = data;
};

export const createAuthor = async (newAuthor) => {
    const {data} = await postRequest('/authors', newAuthor);
    if(!data) return
    authors.value = data;
};

export const updateAuthor = async (id, updatedAuthor) => {
    const { data } = await putRequest(`/authors/${id}`, updatedAuthor);
    if (!data) return;
    authors.value = data;
};

export const deleteAuthor = async (id) => {
    const response = await deleteRequest(`/authors/${id}`);
    if (response.data.message === 403) {
        alert(response.data.message);
    }
    authors.value = authors.value.filter(author => author.id !== id);
};