<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head, Link } from "@inertiajs/vue3"
import SecondaryButton from "@/Components/SecondaryButton.vue"
import { InventoryStatus } from "@/enums.js"
import MultiSelect from "primevue/multiselect"
import { ref } from "vue"

const statuses = [
    {
        value: InventoryStatus.Active,
        label: 'Actif'
    },{
        value: InventoryStatus.Pending,
        label: 'En attente'
    },{
        value: InventoryStatus.Inactive,
        label: 'Inactif'
    }
];

const selectedStatuses = ref([statuses[0]]);

</script>

<template>
    <Head title="Inventaires"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Inventaires</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <Link :href="route('inventories.create')">
                        <SecondaryButton>
                            Ajouter inventaire
                        </SecondaryButton>
                    </Link>
                    <MultiSelect v-model="selectedStatuses" display="chip" :options="statuses" option-label="label" name="status" class="w-1/3" />

                </div>

                <div class="space-y-2 mt-2">
                    <div v-for="inventory in inventories" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="flex justify-between items-center">
                            <Link :href="route('inventories.edit', inventory.id)"
                                  class="text-gray-900 py-2 pl-2 flex-1">
                                <v-icon :name="inventory.status === InventoryStatus.Active ? 'hi-check' : 'hi-x-circle'"
                                        :class="inventory.active ? 'text-green-500' : 'text-red-600'"/>
                                {{ inventory.name }}
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
