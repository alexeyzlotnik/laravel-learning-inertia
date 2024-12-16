<template>
   <AuthenticatedLayout>
      <div>
         <h2 class="text-2xl">{{ props.user.name }}</h2>

         <div class="flex flex-col gap-3 mt-4">
            <p>Check out this author posts:</p>
            <div v-for="(post, index) in posts" class="flex flex-col gap-3 bg-white border text-black rounded p-4">
               <div class="flex flex-col">
                  <p class="font-bold">{{ post.title }}</p>
                  <p>{{ post.content }}</p>
               </div>
               <div class="flex gap-3 justify-end">
                  <Link :href="route('posts.edit', post.id)" class="btn btn-primary w-fit">Change post</Link>
                  <Link :href="route('posts.destroy', post.id)" class="btn btn-secondary w-fit">Delete this post</Link>
               </div>
            </div>
         </div>
      </div>
   </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3'

const props = defineProps(['user', 'posts'])
</script>