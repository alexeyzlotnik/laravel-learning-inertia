<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    post: Object,
});

const form = useForm({
    id: props.post.id,
    title: props.post.title,
    content: props.post.content,
});
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
         <button type="submit" class="btn btn-primary">Update</button>
      </form>
   </AuthenticatedLayout>
</template>
