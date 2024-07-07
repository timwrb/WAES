<script setup>

import Navbar from "@/Layouts/Navbar.vue";
import ParticipantCard from "@/Components/ParticipantCard.vue";
import {Link} from "@inertiajs/vue3";
</script>

<template>
<Navbar>

    <div class="w-full flex justify-center mt-[3rem]">

        <section class="flex justify-center flex-col gap-4">

            <Link href="/" class="flex justify-center w-full mt-[2rem] rounded-full border border-gray-300 px-4 py-2 bg-gray-100 active:scale-95 transition-all duration-150 hover:opacity-85 cursor-pointer">
                Zurück
            </Link>

            <ParticipantCard participant="Tim Wurmbrand" id="6122061" />
            <ParticipantCard participant="Maximilian Fehr" id="6122103" />
            <ParticipantCard participant="Danial Nikdel Amand" id="6122088" />
            <ParticipantCard participant="Tim Schleicher" id="6122016" />
            <ParticipantCard participant="Mohammed Ali Yusuf" id="6122037" />
            <ParticipantCard participant="Maximilian Bausewein" id="6122062" />


        </section>


    </div>

</Navbar>
</template>

<style scoped>

</style>
