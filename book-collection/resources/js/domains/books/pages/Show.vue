<script setup>
import { onMounted } from 'vue';
import Form from '../components/Form.vue';
import ReviewForm from '../../reviews/components/ReviewForm.vue';
import { ref, computed } from 'vue';
import { addBook, getBookById } from '../store';
import { useRoute, useRouter } from 'vue-router';
import { getAuthorById } from '../../authors/store';
import { addReview, fetchReviews } from '../../reviews/store';

const route = useRoute();
const router = useRouter();

const book = getBookById(route.params.id);
const author = computed(() => {
    if (!book.value) return null;
    return getAuthorById(book.value.author_id);
});

const reviews = ref([]);

const review = ref({
    body: '',
    book_id: Number(route.params.id)
});

const handleSubmit = async (data) => {
    await addReview(data);
    router.push({ name: 'books.book', params: { id: route.params.id } });
};

</script>

<template>

    <div v-if="book">
        <h1><strong>{{ book.title }}</strong> by {{ author.name }}</h1>
        <p>{{ book.summary }}</p>
    </div>
    
    
    <ReviewForm v-if="review" :review="review" @submit="handleSubmit" />
    <!--
    <ul v-if ="reviews.length > 0">
        <li v-for="review in reviews" :key="review.id">
            {{ review.body }}
        </li>
    </ul>-->
</template>