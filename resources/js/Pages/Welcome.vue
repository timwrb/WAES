<script setup>
import {Head, Link} from '@inertiajs/vue3';
import Navbar from "@/Layouts/Navbar.vue";
import ExpenseCard from "@/Components/ExpenseCard.vue";


</script>

<template>
    <Head title="WAES Startseite" />
        <Navbar>
<main class="flex flex-col">
            <section class="flex justify-center">
                <div class="w-[68rem] h-screen flex justify-center">

                    <section v-if="!$page.props.auth.user">
                        <h1 class="mt-[3rem] font-semibold text-[1.5rem]">Melde dich an, um deine Ausgaben zu Tracken</h1>
                    </section>

                    <!-- Success Nachricht -->
                    <div v-if="$page.props.success" class="text-green-500">
                        {{ $page.props.success }}
                    </div>

                    <!-- Error Nachricht -->
                    <div v-if="$page.props.error" class="text-red-500">
                        {{ $page.props.error }}
                    </div>

                    <div v-if="$page.props.auth.user" class="w-full px-[4rem] mt-[2rem] space-y-2">
                        <h1 class="font-semibold text-[1.3rem]">Ausgaben von {{ $page.props.auth.user.name }}</h1>
                        <ExpenseCard v-for="expense in $page.props.expenses.data" :key="expense.id" :id="expense.id" :Expense="expense.amount" :Category="expense.category_name" :Method="expense.method" :Description="expense.description" />
                    </div>



                </div>
            </section>

    <div class="mb-[6rem] mt-[4rem] flex flex-row justify-center items-center space-x-1 flex-wrap gap-y-5 select-none">
        <div v-for="link in $page.props.expenses.links">
            <Link
                v-if="link.url"
                :href="link.url"
                v-html="link.label"
                class="px-4 py-2 rounded-lg"
                :class="link.active
                        ? 'bg-gray-500 text-white font-bold border border-transparent'
                        : 'bg-gray-300 border border-gray-300 hover:border-customBlue'"

            />
            <div v-else
                 v-html="link.label"
                 class="px-4 py-2 rounded-lg bg-gray-100 opacity-60 border border-gray-200 text-gray-500 select-none"
            ></div>

        </div>
    </div>
</main>
        </Navbar>
</template>
