<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Navbar from "@/Layouts/Navbar.vue";
import {ref , computed} from "vue";
import InputError from "@/Components/InputError.vue";

const selectedMethod = ref('Bargeld');
const selectedCategoryId = ref(null);


function selectMethod(method) {
    selectedMethod.value = method;
    form.method = method;
}
function selectCategory(id) {
    selectedCategoryId.value = id;
    form.category_id = id; //
}

const form = useForm({
    amount: '',
    description: '',
    category_id: selectedCategoryId.value,
    method: selectedMethod.value,
});

const checkData = () => {
    console.log(form);

}
</script>

<template>
    <Navbar>

    <div class="flex justify-center">

        <section class=" w-[48rem] mx-12 mt-[3rem] pb-6 rounded-[1rem] border border-gray-300 bg-white">
            <div class="flex justify-between items-center">
                <div class="m-8 text-[1.2rem] font-medium">Ausgabe Hinzufügen</div>
                <Link href="/" class="m-4 rounded-full border border-gray-300 flex flex-row justify-center items-center py-2 px-4 cursor-pointer active:scale-95 hover:opacity-85 hover:border-gray-400 transition-all duration-150 select-none">Zurück</Link>
            </div>

            <form @submit.prevent="form.post(route('expense.create'))" class="px-8 flex flex-col space-y-6">


                <div v-if="$page.props.errors" class="w-full flex justify-center text-red-500">
                    <div class="">{{ $page.props.errors.error }}</div>
                </div>

                <div v-if="$page.props.errors.success" class="w-full flex justify-center text-green-500">
                    <div class="">{{ $page.props.errors.success }}</div>
                </div>

                <div class="w-full flex justify-center items-center">
                    <div class="w-[20.5rem] rounded-[1rem] border border-gray-500">

                        <select id="category" @change="selectCategory($event.target.value)" class="border-none rounded-[1rem] w-full outline-none text-[1rem] focus:ring-transparent placeholder:text-gray-200">
                            <option disabled value="">Wähle eine Kategorie aus</option>
                            <option v-for="category in $page.props.categories" :key="category.id" :value="category.id">
                                {{ category.name }}
                            </option>
                        </select>

                    </div>
                </div>


                <div class="w-full flex justify-center"> <!-- Bar oder Karte Auswahl -->
                    <div class="flex flex-row border border-gray-500 rounded-[1rem] px-8 py-2">
                        <div class="flex flex-row rounded-[1rem] border-2 border-black">
                            <div
                                class="flex flex-row gap-2 py-2 w-[8rem] px-4 justify-center rounded-tr rounded-br rounded-[1rem] cursor-pointer select-none"
                                :class="{
            'bg-green-400 text-black': selectedMethod === 'Bargeld',
          }"
                                @click="selectMethod('Bargeld')"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                </svg>
                                Bargeld
                            </div>

                            <div
                                class="flex flex-row gap-2 py-2 px-4 w-[8rem] justify-center rounded-tl rounded-bl rounded-[1rem] cursor-pointer select-none"
                                :class="{
            'bg-green-400 text-black': selectedMethod === 'Karte',
          }"
                                @click="selectMethod('Karte')"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                                </svg>
                                Karte
                            </div>
                        </div>
                    </div>
                </div>  <!-- Bar oder Karte Auswahl Ende-->


            <div class="flex flex-row gap-4 justify-center">
                <div class="flex flex-row rounded-[1rem] border border-gray-500 px-[2rem]"><!-- Geld Menge Input -->
                    <input id="amount" v-model="form.amount" class="border-none outline-none text-[4rem] focus:ring-transparent w-[14rem] placeholder:text-gray-200" placeholder="123.99"/>
                    <label for="amount" class="flex font-light text-[4rem]">€</label>
                </div>
            </div>

                <div class="w-full flex justify-center">
                    <div class="w-[20.5rem]">
                        <textarea
                            id="description"
                            type="text"
                            class="mt-1 block w-full focus:outline-none focus:ring-transparent border-gray-500 focus:border-gray-500 rounded-[1rem]"
                            v-model="form.description"
                            required
                            autofocus
                            placeholder="Beschreibung"
                        />
                    </div>
                </div>

                <div class="w-full flex justify-center">
                    <button
                        class="w-[20.5rem] active:scale-95 transition-all duration-150 rounded-[1rem] font-bold flex items-center justify-center px-8 py-2 border border-gray-500 bg-gray-200 cursor-pointer"
                        type="submit"
                        @click="checkData"
                        :disabled="form.processing">
                        Eintragen</button>
                </div>

            </form>
        </section>


    </div>

    </Navbar>
</template>

<style scoped>

</style>
