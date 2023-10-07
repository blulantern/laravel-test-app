<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

const props = defineProps(['contact', 'contactCount']);

const form = useForm({
    id: props.contact.id,
    name: props.contact.name,
    email: props.contact.email,
    phone: props.contact.phone,
    address: props.contact.address,
    city: props.contact.city,
    region_state: props.contact.region_state,
    country: props.contact.country,
    zip: props.contact.zip
});

const submit = () => {
    form.put(route('contact.update', {id:props.contact.id}), {
        //onFinish: () => forceRerender(),
    });
};

const cancel = () => {
    window.location.href = '/contacts';
}
</script>

<template>
    <Head title="Contacts" />

    <div v-if="contactCount">Contact Count: {{ contactCount }}</div>
    <div class="py-12">
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput type="text" name="name" placeholder="name" v-model="form.name"/>
            </div>
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput type="email" name="email" placeholder="email" v-model="form.email" />
            </div>
            <div>
                <InputLabel for="phone" value="Phone" />
                <TextInput type="text" name="phone" placeholder="phone" v-model="form.phone" />
            </div>
            <div>
                <InputLabel for="address" value="Address" />
                <TextInput type="text" name="address" placeholder="address" v-model="form.address"/>
            </div>
            <div>
                <InputLabel for="city" value="City" />
                <TextInput type="text" name="city" placeholder="city" v-model="form.city"/>
            </div>
            <div>
                <InputLabel for="statee" value="State" />
                <TextInput type="text" name="region_state" placeholder="state" v-model="form.region_state" maxlength="2" />
            </div>
            <div>
                <InputLabel for="country" value="Country" />
                <TextInput type="text" name="country" placeholder="country" v-model="form.country" maxlength="2" />
            </div>
            <div>
                <InputLabel for="zip" value="Zip Code" />
                <TextInput type="text" name="zip" placeholder="zip" v-model="form.zip"/>
            </div>
            <PrimaryButton>Edit</PrimaryButton><PrimaryButton @click="cancel">Cancel</PrimaryButton>
        </form>
    </div>
</template>