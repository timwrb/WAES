<script setup>
import {router, useForm} from '@inertiajs/vue3'
import Navbar from "@/Layouts/Navbar.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    name: '',
});

const submitForm = () => {
    form.post(route('category.create'));
    form.name = '';
};

const deleteCategory = (id) => {
    if (confirm('Möchten Sie diese Kategorie wirklich löschen?')) {
        router.delete(route('category.destroy', id), {
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
    <Navbar>
        <form @submit.prevent="submitForm" class="px-8 flex flex-col space-y-6">

            <div class="w-full flex justify-center mt-[1rem]">
                <!-- Success Nachricht -->
                <div v-if="form.wasSuccessful" class="text-green-500">
                    Kategorie erfolgreich erstellt!
                </div>

                <!-- Error Nachricht -->
                <div v-if="$page.props.error" class="text-red-500">
                    {{ $page.props.error }}
                </div>
            </div>

            <div class="w-full flex justify-center items-center mt-[3rem]">
                <div class="w-[20.5rem] rounded-[1rem] border border-gray-500">
                    <input type="text" id="name" v-model="form.name" class="border-none rounded-[1rem] w-full outline-none text-[1rem] focus:ring-transparent placeholder:text-gray-200" placeholder="Kategorie Name">
                </div>
            </div>
            <div class="w-full flex justify-center">
                <button
                    class="w-[20.5rem] active:scale-95 transition-all duration-150 rounded-[1rem] font-bold flex items-center justify-center px-8 py-2 border border-gray-500 bg-gray-200 cursor-pointer"
                    type="submit"
                    :disabled="form.processing">
                    Kategorie hinzufügen</button>
            </div>
        </form>


        <!-- Categories Table -->
        <div class="w-full flex justify-center mt-[3rem]">
            <section class="w-[20.5rem] rounded-[1rem]">

                <div v-for="category in $page.props.categories" :key="category.id" class="flex flex-row items-center mb-1">
                    <div class="border rounded-[1rem] px-4 py-2 cursor-pointer flex flex-row items-center justify-between w-full hover:bg-gray-100">
                        <p>{{ category.name }}</p>

                        <div class="flex flex-row gap-1">

                                <div type="submit" class="border p-2 rounded-full bg-neutral-50 hover:opacity-85" @click="deleteCategory(category.id)"> <!-- Löschen -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                </div>

                        </div>


                    </div>
                </div>

            </section>

            <!-- <Teleport to="body">
                <dialog class="w-screen h-screen flex justify-center items-center">
                    <div class="w-[30rem] h-[20rem]">
                        <p>Bist du dir sicher, dass du die Kategorie löschen willst</p>
                        <button>Löschen</button>
                        <button>Abbrechen</button>
                    </div>

                </dialog>
            </Teleport> -->

        </div>
    </Navbar>
</template>

<style scoped>

</style>
