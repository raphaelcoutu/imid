<script setup>
import { Dialog, DialogPanel, DialogTitle } from '@headlessui/vue'
import { ref } from "vue"
import { slugify } from "../helpers.js"
import SecondaryButton from "@/Components/SecondaryButton.vue"
import DangerButton from "@/Components/DangerButton.vue"

const isOpen = ref(true)

function setIsOpen(value) {
    isOpen.value = value
}

const props = defineProps({
    title: String,
    item: String
})

const slugItem = slugify(props.item)

const input = ref('')

</script>

<template>
    <Dialog :open="isOpen" @close="setIsOpen" class="relative z-50">
        <!---- The backdrop, rendered as a fixed sibling to the panel container -->
        <div class="fixed inset-0 bg-black/30">

            <!-- Full-screen scrollable container -->
            <div class="fixed inset-0 w-screen overflow-y-auto">

                <div class="fixed inset-0 flex w-screen items-center justify-center">
                    <!-- The actual dialog -->
                    <DialogPanel class="w-full max-w-md rounded bg-white shadow-xl p-4">
                        <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">{{
                                title
                            }}
                        </DialogTitle>
                        <div class="mt-2 text-sm text-gray-500">
                            <p>
                                Vous êtes sur le point de supprimer un élément important.
                            </p>
                            <p>Veuillez inscrire '<span class="bg-red-100 text-red-950 font-bold">{{slugItem}}</span>' dans la champ ci-dessous:</p>
                        </div>

                        <input type="text" v-model="input" class="w-full">

                        <div class="mt-4 space-x-2">
                            <DangerButton
                                @click="setIsOpen(false)"
                                type="button"
                                class="disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-red-600"
                                :disabled="input !== slugItem">
                                Supprimer
                            </DangerButton>
                            <SecondaryButton @click="setIsOpen(false)">Annuler</SecondaryButton>
                        </div>
                    </DialogPanel>
                </div>
            </div>
        </div>
    </Dialog>
</template>
