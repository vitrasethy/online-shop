<script setup>
import { Link, Head } from "@inertiajs/vue3";

defineProps({
    carts: Array,
    originalTotal: Number,
});
</script>

<template>
    <Head title="Cart" />
    <section class="antialiased">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2
                class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl"
            >
                Shopping Cart
            </h2>
            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                    <div class="space-y-6">
                        <div
                            v-if="carts && carts.length === 0"
                            class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                            role="alert"
                        >
                            <svg
                                class="flex-shrink-0 inline w-4 h-4 me-3"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
                                />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium"
                                    >No items in cart!!!</span
                                >
                                Please add items into a cart.
                            </div>
                        </div>
                        <div
                            v-for="cart in carts"
                            class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6"
                        >
                            <div
                                class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0"
                            >
                                <div class="shrink-0 md:order-1">
                                    <img
                                        class="h-20 w-20"
                                        :src="cart.product.photo"
                                        alt="imac image"
                                    />
                                </div>

                                <label for="counter-input" class="sr-only"
                                    >Choose quantity:</label
                                >
                                <div
                                    class="flex items-center justify-between md:order-3 md:justify-end"
                                >
                                    <div class="flex items-center">
                                        <Link
                                            :href="
                                                route('cart.update', {
                                                    cart: cart.id,
                                                    change: 'decrement',
                                                })
                                            "
                                            method="put"
                                            as="button"
                                            class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                                        >
                                            <svg
                                                class="h-2.5 w-2.5 text-gray-900 dark:text-white"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 18 2"
                                            >
                                                <path
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M1 1h16"
                                                />
                                            </svg>
                                        </Link>
                                        <p
                                            class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white"
                                        >
                                            {{ cart.quantity }}
                                        </p>
                                        <Link
                                            :href="
                                                route('cart.update', {
                                                    cart: cart.id,
                                                    change: 'increment',
                                                })
                                            "
                                            method="put"
                                            as="button"
                                            class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                                        >
                                            <svg
                                                class="h-2.5 w-2.5 text-gray-900 dark:text-white"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 18 18"
                                            >
                                                <path
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 1v16M1 9h16"
                                                />
                                            </svg>
                                        </Link>
                                    </div>
                                    <div class="text-end md:order-4 md:w-32">
                                        <p
                                            class="text-base font-bold text-gray-900 dark:text-white"
                                        >
                                            ${{ cart.total_price }}
                                        </p>
                                    </div>
                                </div>

                                <div
                                    class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md"
                                >
                                    <p
                                        class="text-base font-medium text-gray-900 dark:text-white"
                                    >
                                        {{ cart.product.name }}
                                    </p>

                                    <div class="flex items-center gap-4">
                                        <button
                                            disabled
                                            type="button"
                                            class="inline-flex disabled:hover:cursor-not-allowed items-center text-sm font-medium text-gray-500 hover:text-gray-900 hover:underline dark:text-gray-400 dark:hover:text-white"
                                        >
                                            <svg
                                                class="me-1.5 h-5 w-5"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"
                                                />
                                            </svg>
                                            Add to Favorites
                                        </button>

                                        <Link
                                            method="delete"
                                            :href="
                                                route('carts.destroy', {
                                                    cart: cart.id,
                                                })
                                            "
                                            as="button"
                                            class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500"
                                        >
                                            <svg
                                                class="me-1.5 h-5 w-5"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M6 18 17.94 6M18 18 6.06 6"
                                                />
                                            </svg>
                                            Remove
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    v-if="carts && carts.length !== 0"
                    class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-[40vw]"
                >
                    <div
                        class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6"
                    >
                        <p
                            class="text-xl font-semibold text-gray-900 dark:text-white"
                        >
                            Order summary
                        </p>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl
                                    class="flex items-center justify-between gap-4"
                                >
                                    <dt
                                        class="text-base font-normal text-gray-500 dark:text-gray-400"
                                    >
                                        Original price
                                    </dt>
                                    <dd
                                        class="text-base font-medium text-gray-900 dark:text-white"
                                    >
                                        ${{ originalTotal }}
                                    </dd>
                                </dl>
                            </div>

                            <dl
                                class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700"
                            >
                                <dt
                                    class="text-base font-bold text-gray-900 dark:text-white"
                                >
                                    Total
                                </dt>
                                <dd
                                    class="text-base font-bold text-gray-900 dark:text-white"
                                >
                                    ${{ originalTotal }}
                                </dd>
                            </dl>
                        </div>

                        <Link
                            as="button"
                            :href="route('checkout')"
                            class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            >Proceed to Checkout</Link
                        >

                        <div class="flex items-center justify-center gap-2">
                            <span
                                class="text-sm font-normal text-gray-500 dark:text-gray-400"
                            >
                                or
                            </span>
                            <Link
                                as="button"
                                :href="route('home')"
                                class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline dark:text-primary-500"
                            >
                                Continue Shopping
                                <svg
                                    class="h-5 w-5"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 12H5m14 0-4 4m4-4-4-4"
                                    />
                                </svg>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
