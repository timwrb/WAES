<script setup>
import { Link } from '@inertiajs/vue3';
import Navbar from "@/Layouts/Navbar.vue";
</script>

<template>
<Navbar>

    <div class="w-full flex justify-center">
        <Link href="/" class="flex justify-center w-[30rem] mt-[2rem] rounded-full border border-gray-300 px-4 py-2 bg-gray-100 active:scale-95 transition-all duration-150 hover:opacity-85 cursor-pointer">
            Zurück
        </Link>
    </div>

    <section class="flex justify-center mt-[1rem]">

        <div class="flex w-[30rem] border border-gray-300 rounded-[1rem] p-4 flex-col gap-4">

            <div class="flex justify-between">
                <div class="rounded-lg px-2 py-1 border-red-600 bg-red-200 text-red-600">€ {{ $page.props.expense.amount }}</div>
                <div class="rounded-lg px-2 py-1 border-grey-500 bg-gray-200 text-gray-500">{{ $page.props.expense.category_id }}</div>

                <div class="flex">
                    <div v-if="$page.props.expense.method === 'Bargeld'" class="rounded-lg px-2 py-1 border-green-500 bg-green-200 text-green-500 flex flex-row gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" /></svg>
                        Bargeld</div>

                    <div v-if="$page.props.expense.method === 'Karte'" class="rounded-lg px-2 py-1 border-blue-500 bg-blue-200 text-blue-500 flex flex-row gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" /></svg>
                        Karte</div>
                </div>

            </div>

            <div class="border border-gray-300 rounded-[1rem] p-4 flex flex-col">
                <p class="font-bold mb-2">Notitz:</p>
                <p class="text-[0.9rem]">{{ $page.props.expense.description }}</p>
            </div>

            <p class="font-semibold text-[1.1rem] px-4 py-2 border border-gray-300 bg-gray-50 rounded-[1rem] flex justify-center">{{ $page.props.auth.user.name }}</p>

        </div>

    </section>

</Navbar>
</template>

<style scoped>

</style>
