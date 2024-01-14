<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue"
import InputLabel from "@/Components/InputLabel.vue"
import TextInput from "@/Components/TextInput.vue"
import InputError from "@/Components/InputError.vue"
import InputSwitch from "primevue/inputswitch"

const props = defineProps({
    form: Object,
    submit: Function
})

</script>

<template>
    <form @submit.prevent="submit">
        <div>
            <InputLabel for="name" value="Nom"/>
            <TextInput id="name" type="text" class="w-full" v-model="props.form.name" required autofocus/>
            <InputError class="mt-2" :message="props.form.errors.name"/>
        </div>

        <div class="flex flex-wrap -mr-4">
            <div class="mt-2 w-1/2 pr-4">
                <InputLabel for="address" value="Adresse"/>
                <TextInput id="address" v-model="props.form.address" class="w-full"/>
            </div>

            <div class="mt-2 w-1/2 pr-4">
                <InputLabel for="city" value="Ville"/>
                <TextInput id="city" v-model="props.form.city" class="w-full"/>
            </div>

            <div class="mt-2 w-1/2 pr-4">
                <InputLabel for="province" value="Province"/>
                <TextInput id="province" v-model="props.form.province" class="w-full"/>
            </div>

            <div class="mt-2 w-1/2 pr-4">
                <InputLabel for="postal_code" value="Code postal"/>
                <TextInput id="postal_code" v-model="props.form.postal_code" class="w-full"/>
            </div>
        </div>

        <div class="mt-2 flex items-center">
            <InputSwitch v-model="props.form.active" input-id="active"/>
            <label for="active" class="ml-2"> Actif </label>
        </div>
        <div class="mt-4 flex justify-between">
            <PrimaryButton :disabled="props.form.processing">Enregistrer</PrimaryButton>
        </div>
    </form>
</template>
