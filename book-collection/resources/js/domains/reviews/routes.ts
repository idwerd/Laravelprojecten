import Create from './pages/Create.vue';
import Edit from './pages/Edit.vue';

export const reviewRoutes =  [
    { path: '/:bookId/reviews/create', component: Create, name: 'reviews.create' },
    { path: '/:bookId/reviews/:id/edit', component: Edit, name: 'reviews.edit' },
];