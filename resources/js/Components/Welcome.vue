<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template class="2xl">
    <Head title="Welcome" />
    
    <AuthenticationCard  style="background-image: url('/storage/bgtwansa.jpg') ;
  background-repeat: no-repeat;
  background-size: cover;">
          <template #logo >
            <div class="   md:w-3/8 flex-col items-center bg-gray-50 rounded-2xl md:rounded-xl-none mt-103 md:mt-5">
                <div class="w-full pl-0 md:pl-18 flex flex-col md:flex-row items-center">
                <div class="text-gray-600 text-xl pl-5 ml-4">
                <span class=" md:pl-15 font-serif items-center"><span class="font-bold items-center text-xm text-red-800">Twansa Messenger</span> welcome to the 100% tunisian social media ... </span>
                <img classe="w-10 h-10" src="https://www.twansa.info/storage/images/app/logotwansamin.png" >
                
                
                    
            
                <Link :href="route('login')" class=" font-semibold text-red-400 hover:text-red-600 dark:text-red-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 ">Log in</Link>
                <Link v-if="canRegister" :href="route('register')" class="ml-60 font-semibold text-red-400 hover:text-red-600 dark:text-red-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</Link>
            
                </div>
            </div>
        </div>
    
             </template>
            </AuthenticationCard>
           
    <div class=" fixed sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div v-if="canLogin" class="sm:fixed sm:top-20 sm:right-20 sm:center-0 p-6 text-center text-3xl">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">TwansaMessenger</Link>

        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
           <!-- add picture of twansa--->
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
     background-image: url('/storage/bgtwansa.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
 background-image: url('/storage/bgtwansa.jpg');
  background-repeat: no-repeat;
  background-size: cover;    }
}
</style>
