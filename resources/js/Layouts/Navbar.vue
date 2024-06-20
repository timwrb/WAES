<script setup lang="ts">
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';




const isOpen = ref(false);
const isOpenAdd = ref(false);

const toggleDropdown = () => {
    isOpen.value = !isOpen.value;
}
const closeDropdown = () => {
    isOpen.value = false;
}

const toggleDropdownAdd = () => {
    isOpenAdd.value = !isOpenAdd.value;
}
const closeDropdownAdd = () => {
    isOpenAdd.value = false;
}
</script>

<template>
    <nav class="w-full h-[4rem] bg-gray-200 px-[2rem] flex justify-between items-center">

        <div class="flex flex-row items-center gap-4">
            <Link href="/" class="font-semibold text-[2rem] cursor-pointer hover:opacity-75 transition-all duration-100">WAES Portfolio 2024</Link>
            <Link href="/info" class="rounded-full p-2 bg-gray-300 cursor-pointer active:scale-95 transition-all duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" /></svg>
            </Link>
        </div>


        <div class="flex flex-row">
            <div class="relative">
                <button
                    v-if="$page.props.auth.user"
                    @click="toggleDropdownAdd"
                    class="hover:opacity-85 flex flex-row items-center ml-2 mr-4 py-2 px-4 rounded-[1rem] bg-gray-300 gap-2 active:scale-95 transition-all duration-150"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                </button>

                <Transition
                    enter-from-class="opacity-30 duration-150"
                    enter-to-class="opacity-100"
                    leave-from-class="opacity-100 duration-150"
                    leave-to-class="opacity-0"
                >
                    <ul v-if="isOpenAdd" class="absolute right-0 mt-4 p-2 shadow-lg bg-white rounded-[1rem] border border-gray-300 w-[15rem] z-20 transition-all duration-150">

                        <li v-if="$page.props.auth.user">
                            <div><Link href="/create/expense" method="get" class="flex flex-row gap-2 text-semibold text-[1.1rem] h-[3rem] items-center rounded-[1rem] pl-2 hover:bg-gray-200" @click="closeDropdownAdd">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                                Ausgabe Hinzufügen</Link></div>

                            <div><Link href="/create/category" class="flex flex-row gap-2 text-semibold text-[1.1rem] h-[3rem] items-center rounded-[1rem] pl-2 hover:bg-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                                Kategorien</Link></div>
                        </li>


                    </ul>
                </Transition>
            </div>

            <div class="relative">

                <button
                    v-if="$page.props.auth.user"
                    @click="toggleDropdown"
                    class="hover:opacity-85 flex flex-row items-center ml-2 mr-4 py-2 px-4 rounded-[1rem] bg-gray-300 gap-2 active:scale-95 transition-all duration-150"
                >
                    {{ $page.props.auth.user.name }}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                </button>

                <button
                    v-else
                    @click="toggleDropdown"
                    class="flex flex-row items-center ml-2 mr-4 py-2 px-4 rounded-[1rem] bg-gray-300 gap-2 active:scale-95 transition-all duration-150"
                >
                    Anmelden
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                </button>

                <Transition
                enter-from-class="opacity-30 duration-150"
                enter-to-class="opacity-100"
                leave-from-class="opacity-100 duration-150"
                leave-to-class="opacity-0"
                >
                <ul v-if="isOpen" class="absolute right-0 mt-4 p-2 shadow-lg bg-white rounded-[1rem] border border-gray-300 w-[15rem] z-20 transition-all duration-150">

                    <li v-if="$page.props.auth.user">
                        <div><Link href="/profile" class="flex flex-row gap-2 text-semibold text-[1.1rem] h-[3rem] items-center rounded-[1rem] pl-4 hover:bg-gray-200" @click="closeDropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                            Profil</Link></div>

                        <div><Link :href="route('logout')" method="post" class="flex flex-row gap-2 text-semibold text-[1.1rem] h-[3rem] items-center rounded-[1rem] pl-4 hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" /></svg>
                            Abmelden</Link></div>
                    </li>

                    <li v-else>
                    <div><Link href="/login" class="flex flex-row gap-2 text-semibold text-[1.1rem] h-[3rem] items-center rounded-[1rem] pl-4 hover:bg-gray-200" @click="closeDropdown">
                        Anmelden</Link></div>

                    <div><Link href="/register" class="flex flex-row gap-2 text-semibold text-[1.1rem] h-[3rem] items-center rounded-[1rem] pl-4 hover:bg-gray-200" @click="closeDropdown">
                        Registrieren</Link></div>
                    </li>

                </ul>
                </Transition>

            </div>
        </div>
    </nav>

    <slot class="bg-gray-100"/>

</template>

<style scoped>

</style>
