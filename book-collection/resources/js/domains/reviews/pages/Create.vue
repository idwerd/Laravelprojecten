<script setup>
import ReviewForm from '../components/ReviewForm.vue';
import { ref, computed } from 'vue';
import { addReview } from '../store';
import { useRoute, useRouter } from 'vue-router';
import { getBookById } from '../../books/store';

const route = useRoute();
const router = useRouter();

const book = getBookById(route.params.bookId);
console.log(book.value);

const review = ref({
    body: '',
    book_id: route.params.bookId
});

const handleSubmit = async (data) => {
    await addReview(data);
    router.push({name: 'books.show', params: { id: book.value.id } });
};
</script>

<template>

    <div>
        <h2>Review voor {{ book.title }}</h2>
        <ReviewForm :review="review" @submit="handleSubmit" />
    </div>

</template>