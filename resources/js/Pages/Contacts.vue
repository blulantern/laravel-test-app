<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import axios from 'axios';

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
        onFinish: () => forceRerender(),
    });
};
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
                <TextInput type="text" name="country" placeholder="country" v-model="form.country" />
            </div>
            <div>
                <InputLabel for="zip" value="Zip Code" />
                <TextInput type="text" name="zip" placeholder="zip" v-model="form.zip" />
            </div>
            <PrimaryButton>
                    Log in
            </PrimaryButton>
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
            <td></td>
        </tr>
    </table>
</template>

<script>
// export default {
//   data() {
//     return {
//       store: {
//         name:'',
//         email:'',
//         phone:'',
//         address:'',
//         city:'',
//         region_state:'',
//         country:'',
//         zip:''
//       },
//       //componentKey: 0,
//     }
//   },
//   methods: {
//     submit: async function() {
//         await axios.post('contacts', this.store)
//         .then(function(res) {
//             forceRerender();
//         })
//         .catch(function(err) {
//             console.log(err);
//         });
//     },
//     forceRerender(){
//         this.componentKey += 1;
//     }
//   }
// }
</script>