<script setup>
import { Head } from '@inertiajs/vue3';
import axios from 'axios';

const props = defineProps(['contacts', 'contactCount']);
</script>

<template>
    <Head title="Contacts" />

    <div>{{contactCount}}</div>
    <div class="py-12">
        <form @submit.prevent="submit">
            <div>
                <input type="text" name="name" placeholder="name" v-model="store.name" />
            </div>
            <div>
                <input type="email" name="email" placeholder="email" v-model="store.email" />
            </div>
            <div>
                <input type="text" name="phone" placeholder="phone" v-model="store.phone" />
            </div>
            <div>
                <input type="text" name="address" placeholder="address" v-model="store.address" />
            </div>
            <div>
                <input type="text" name="city" placeholder="city" v-model="store.city" />
            </div>
            <div>
                <input type="text" name="region_state" placeholder="state" v-model="store.region_state" />
            </div>
            <div>
                <input type="text" name="country" placeholder="country" v-model="store.country" />
            </div>
            <div>
                <input type="text" name="zip" placeholder="zip" v-model="store.zip" />
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <table>
        <tr :key="componentKey" v-for="contact in contacts">
            <td>{{ contact.name }}</td>
            <td>{{ contact.email }}</td>
            <td>{{ contact.phone }}</td>
            <td>{{ contact.address }}</td>
            <td>{{ contact.city }}</td>
            <td>{{ contact.region_state }}</td>
            <td>{{ contact.country }}</td>
            <td>{{ contact.zip }}</td>
        </tr>
    </table>
</template>

<script>
export default {
  data() {
    return {
      store: {
        name:'',
        email:'',
        phone:'',
        address:'',
        city:'',
        region_state:'',
        country:'',
        zip:''
      },
      componentKey: 0,
    }
  },
  methods: {
    submit: async function() {
        await axios.post('contacts', this.store)
        .then(function(res) {
            forceRerender();
        })
        .catch(function(err) {
            console.log(err);
        });
    },
    forceRerender(){
        this.componentKey += 1;
    }
  }
}
</script>