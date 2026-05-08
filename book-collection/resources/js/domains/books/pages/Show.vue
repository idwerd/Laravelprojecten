<script setup>
import { onMounted } from 'vue';
import Form from '../components/Form.vue';
import ReviewForm from '../../reviews/components/ReviewForm.vue';
import { ref, computed } from 'vue';
import { addBook, getBookById } from '../store';
import { useRoute, useRouter } from 'vue-router';
import { getAuthorById } from '../../authors/store';
import { addReview, fetchReviews, getAllReviews, getReviewById } from '../../reviews/store';
import { fetchBooks } from '../../books/store';
import { fetchAuthors } from '../../authors/store';

const route = useRoute();
const router = useRouter();

onMounted(async () => {
    fetchBooks();
    fetchReviews();
    fetchAuthors()
});

const book = computed(() => getBookById(route.params.id));

const author = computed(() => {
    if (!book.value) return null;
    return getAuthorById(book.value.author_id);
});

//const reviews = computed(() => book.value?.reviews || []);

</script>

<template>

    <pre>{{ book }}</pre>
    <pre>{{ author }}</pre>


    <div v-if="book">
        <h1>
            <strong>{{ book.title }}</strong> 
            <span v-if="author">by {{ author.name }}</span>
        </h1>
        <p>{{ book.summary }}</p>
        
        <router-link :to="{ name: 'reviews.create', params: { bookId: route.params.id } }">Schrijf een review</router-link>
    </div>

    <h2>Reviews</h2>
    <!--
    <ul>
        <li v-for="review in reviews" :key="review.id">
            {{ review.body }}
        </li>
    </ul>
-->
</template>