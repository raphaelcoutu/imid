<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head, router, useForm } from "@inertiajs/vue3"
import PartialForm from './PartialForm.vue'

const { facility } = defineProps(['facility'])

const form = useForm({
    name: facility.name,
    active: facility.active,
    address: facility.address,
    city: facility.city,
    province: facility.province,
    postal_code: facility.postal_code
})

const submit = () => {
    form.put(route('facilities.update', facility.id), {
        onSuccess: () => router.visit(route('facilities.index'))
    })
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
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <PartialForm :submit="submit" :form="form"/>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
