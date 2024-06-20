<script setup>
import { defineProps, ref } from 'vue';
import {Link, router} from '@inertiajs/vue3';
const props = defineProps([
    'Category',
    'Method',
    'Expense',
    'Description',
    'id'
]);

const urlViewPage = '/view/' + props.id;
const urlEditPage = '/edit/expense/' + props.id;

const deleteExpense = (id) => {
    if (confirm('Möchten Sie diese Ausgabe wirklich löschen?')) {
        router.delete(route('expense.destroy', id), {
            onSuccess: () => {
            },
            onError: (error) => {
                console.error(error)
            }
        })
    }
}

</script>

<template>
<div class="rounded-[1rem] border border-gray-300 p-4 w-full flex flex-row justify-between gap-2 items-center hover:bg-gray-100 transition-all duration-100 hover:border-gray-400 cursor-pointer">
<section class="flex flex-row gap-2 items-center">
    <div class="rounded-lg px-2 py-1 border-red-600 bg-red-200 text-red-600">€ {{ Expense }}</div>
    <div class="rounded-lg px-2 py-1 border-grey-500 bg-gray-200 text-gray-500">{{ Category}}</div>

    <div class="">
    <div v-if="Method === 'Bargeld'" class="rounded-lg px-2 py-1 border-green-500 bg-green-200 text-green-500 flex flex-row gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" /></svg>
        Bargeld</div>

    <div v-if="Method === 'Karte'" class="rounded-lg px-2 py-1 border-blue-500 bg-blue-200 text-blue-500 flex flex-row gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" /></svg>
        Karte</div>
    </div>
    <p class="line-clamp-1">{{ Description }}</p>
</section>

    <section class="flex flex-row gap-2">

        <Link :href="urlViewPage" type="submit" class="border p-2 rounded-full bg-neutral-50 hover:opacity-85 hover:border-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
        </Link>

        <Link :href="urlEditPage" type="submit" class="border p-2 rounded-full bg-neutral-50 hover:opacity-85 hover:border-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>
        </Link>

        <div type="submit" class="border p-2 rounded-full bg-neutral-50 hover:opacity-85 hover:border-gray-400" @click="deleteExpense(id)"> <!-- Löschen -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
        </div>


    </section>
</div>


</template>

<style scoped>

</style>
