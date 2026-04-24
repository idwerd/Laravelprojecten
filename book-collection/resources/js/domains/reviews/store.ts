import axios from 'axios';
import { ref, computed } from 'vue';
import { getRequest, postRequest, putRequest, deleteRequest } from '../../../services/http';
import { storeModuleFactory } from '../../../services/store';

const reviewStore = storeModuleFactory('reviews');
reviewStore.actions.getAll();

// getters
export const getAllReviews = reviewStore.getters.all;
export const getReviewById = reviewStore.getters.getById;

// actions
export const fetchReviews = async () => {
    await reviewStore.actions.getAll();
};

export const addReview = async (data) => {
    await reviewStore.actions.create(data);
    // code...
};

export const updateReview = async (id, data) => {
    await reviewStore.actions.update(id, data);
    // code...
};

export const deleteReview = async (id) => {
    await reviewStore.actions.delete(id);
    // code...
};