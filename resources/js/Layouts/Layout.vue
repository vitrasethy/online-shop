<script setup>
import NavBar from "@/Components/NavBar.vue";
</script>

<template>
    <main class="mx-12">
        <header>
            <NavBar />
        </header>
        <div class="mt-24 flex justify-center">
            <slot />
        </div>
    </main>
</template>
