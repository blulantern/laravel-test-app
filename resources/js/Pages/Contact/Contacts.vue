<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

const props = defineProps(['contacts', 'contactCount']);

const form = useForm({
    name:'',
    email:'',
    phone:'',
    address:'',
    city:'',
    region_state:'',
    country:'',
    zip:''
});

const submit = () => {
    form.post(route('contact.store'), {
        //onFinish: () => forceRerender(),
    });
};

const deleteContact = (contact) => {
    form.delete(route('contact.delete', contact.id), {
        
    });
}

const view = (contact) => {
    window.location.href = '/contacts/'+contact.id;
}
</script>

<template>
    <Head title="Contacts" />

    <div v-if="contactCount">Contact Count: {{ contactCount }}</div>
    <div class="py-12">
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput type="text" name="name" placeholder="name" v-model="form.name" />
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
                <TextInput type="text" name="address" placeholder="address" v-model="form.address" />
            </div>
            <div>
                <InputLabel for="city" value="City" />
                <TextInput type="text" name="city" placeholder="city" v-model="form.city" />
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
                <TextInput type="text" name="zip" placeholder="zip" v-model="form.zip" />
            </div>
            <PrimaryButton>Add</PrimaryButton>
        </form>
    </div>

    <table>
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>City</th>
            <th>Region/State</th>
            <th>Country</th>
            <th>Zip</th>
            <th>Actions</th>
        </thead>
        <tr v-for="contact in contacts">
            <td>{{ contact.name }}</td>
            <td>{{ contact.email }}</td>
            <td>{{ contact.phone }}</td>
            <td>{{ contact.address }}</td>
            <td>{{ contact.city }}</td>
            <td>{{ contact.region_state }}</td>
            <td>{{ contact.country }}</td>
            <td>{{ contact.zip }}</td>
            <td>
                <PrimaryButton @click="view(contact)" > View </PrimaryButton> 
                <PrimaryButton @click="deleteContact(contact)"> Delete </PrimaryButton>
            </td>
        </tr>
    </table>
</template>