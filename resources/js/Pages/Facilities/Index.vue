<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head, Link, router } from "@inertiajs/vue3"
import DangerButton from "@/Components/DangerButton.vue"
import SecondaryButton from "@/Components/SecondaryButton.vue"

import { HiCheck, HiXCircle } from 'oh-vue-icons/icons'
import { addIcons } from "oh-vue-icons"

addIcons(HiCheck, HiXCircle)

defineProps(['facilities'])

function deleteFacility(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cette installation ?")) {
        router.delete(route('facilities.destroy', id), {
            onSuccess: () => router.visit(route('facilities.index'))
        })
    }
}

</script>

<template>
    <Head title="Installations"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Installations</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link :href="route('facilities.create')">
                    <SecondaryButton>
                        Ajouter installation
                    </SecondaryButton>
                </Link>
                <div class="space-y-2 mt-2">
                    <div v-for="facility in facilities" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="flex justify-between items-center">
                            <Link :href="route('facilities.edit', facility.id)" class="text-gray-900 py-2 pl-2 flex-1">
                                <v-icon :name="facility.active ? 'hi-check' : 'hi-x-circle'" :class="facility.active ? 'text-green-500' : 'text-red-600'"/>
                                {{ facility.name }}
                            </Link>
                            <DangerButton @click="deleteFacility(facility.id)">Supprimer</DangerButton>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
