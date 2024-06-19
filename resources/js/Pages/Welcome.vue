<script setup>
import {Head, Link} from '@inertiajs/vue3';
import Navbar from "@/Layouts/Navbar.vue";
import ExpenseCard from "@/Components/ExpenseCard.vue";


</script>

<template>
    <Head title="WAES Startseite" />
        <Navbar>

            <section class="flex justify-center">
                <div class="w-[68rem] h-screen border-x flex justify-center">

                    <section v-if="!$page.props.auth.user">
                        <h1 class="mt-[3rem] font-semibold text-[1.5rem]">Melde dich an, um Ausgaben zu Tracken und anderen Usern geld zu schicken</h1>
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
                        <ExpenseCard v-for="expense in $page.props.expenses" :key="expense.id" :id="expense.id" :Expense="expense.amount" :Category="expense.category_name" :Method="expense.method" :Description="expense.description" />
                    </div>


                </div>
            </section>
        </Navbar>
</template>
