<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { computed } from 'vue'

import { useForm } from '@inertiajs/vue3';

const props = defineProps({
   post: Object,
   users: Array,
});

const form = useForm({
    id: props.post.id,
    title: props.post.title,
    content: props.post.content,
    user_id: props.post.user_id
});

const userList = computed(() => {
    return props.users.map(user => ({
        id: user.id,
        name: user.name
    }))
})
</script>

<template>
   <Head title="Edit Post" />
   <AuthenticatedLayout>
      <form @submit.prevent="form.put(route('posts.update', form.id))" class="flex flex-col gap-3">
         <div>
            <label for="title">Title</label>
            <input type="text" id="title" v-model="form.title" class="text-black w-full" />
         </div>
         <div>
            <label for="content">Content</label>
            <textarea id="content" v-model="form.content" class="text-black w-full"></textarea>
         </div>
         <select v-model="form.user_id" class="text-black">
            <option value="" disabled>Please select author</option>
            <option v-for="user in userList" :key="user.id" :value="user.id">
                {{ user.name }}
            </option>
         </select>

         <button type="submit" class="btn btn-primary">Update</button>
      </form>
   </AuthenticatedLayout>
</template>
