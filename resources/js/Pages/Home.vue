<script setup>
import { router, Head } from "@inertiajs/vue3";
import { useToast } from "primevue/usetoast";
import Toast from "primevue/toast";

const toast = useToast();

const handleAddToCart = (productID) => {
    router.post(
        route("carts.store"),
        { product_id: productID },
        {
            onSuccess: () =>
                toast.add({
                    severity: "success",
                    summary: "Success",
                    detail: "Successful add item to cart.",
                    life: 2000,
                }),
        },
    );
};

defineProps({
    products: {
        type: Array,
        default: () => [
            {
                id: Number,
                photo: String,
                name: String,
                price: Number,
            },
        ],
    },
});
</script>

<template>
    <Head title="Home" />
    <main class="grid grid-cols-3 gap-4">
        <div
            v-for="product in products"
            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
        >
            <img
                class="p-5 mx-auto rounded-3xl object-cover object-center h-64"
                :src="product.photo"
                alt="product image"
            />
            <div class="px-5 pb-5">
                <h5
                    class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"
                >
                    {{ product.name }}
                </h5>
                <div class="flex items-center justify-between mt-5">
                    <span
                        class="text-3xl font-bold text-gray-900 dark:text-white"
                        >${{ product.price }}</span
                    >
                    <Toast position="bottom-right" class="bg-green-600" />
                    <button
                        @click="handleAddToCart(product.id)"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </main>
</template>
