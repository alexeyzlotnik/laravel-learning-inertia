<template>
    <Head title="Posts" />

   <AuthenticatedLayout>
      <template #header>
         <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Posts</h2>
      </template>
      <table>
         <thead>
            <tr>
               <th class="p-4">Title</th>
               <th class="p-4">Content</th>
               <th class="p-4">Created At</th>
               <th class="p-4">Author</th>
            </tr>
         </thead>
         <tbody>
            <tr v-for="post in posts.data" class="border-b border-gray-200" :key="post.id">
               <td class="p-4">{{ post.title }}</td>
               <td class="p-4">{{ post.content }}</td>
               <td class="p-4">{{ post.created_at }}</td>
               <td class="p-4">
                  <Link :href="route('users.show', post.user.id)" class="underline hover:font-bold">
                     {{ post.user.name }}
                  </Link>
               </td>
               <td class="p-4">
                  <Link :href="route('posts.edit', post.id)" class="btn btn-secondary mr-2">Edit</Link>
                  <Link :href="route('posts.destroy', post.id)" class="btn btn-primary">Delete</Link>
               </td>
            </tr>
         </tbody>
      </table>
      <Pagination :links="posts.links" />
   </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';

const props = defineProps(['posts'])
</script>