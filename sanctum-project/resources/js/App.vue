<script setup></script>

<template>
    <nav>
        <router-link :to="{name: 'auth.login'}">Inloggen</router-link>
    </nav>
    <router-view></router-view>
</template>