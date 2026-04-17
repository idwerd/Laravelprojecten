<script setup></script>

<template>
    <nav>
        <router-link :to="{name: 'books.overview'}">Boeken Overzicht</router-link> |
        <router-link :to="{name: 'books.create'}">Nieuw Boek Toevoegen</router-link>
        <router-link :to="{name: 'authors.overview'}">Auteurs</router-link>
        <router-link :to="{name: 'authors.create'}">Nieuwe Auteur Toevoegen</router-link>
    </nav>
    <router-view></router-view>
</template>