<script setup>
import { Head } from '@inertiajs/vue3';

// const props  = defineProps({
//     users: ''
// })
// console.log(props)
const columns = [
    { data: 'id' },
    { data: 'name' },
    { data: 'email' },
    { data: 'phone' },

];

</script>
<Head title="Players" />
<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <button  class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal" @click="create">
                <svg width="2em" height="2em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                    <g id="SVGRepo_iconCarrier"> <path d="M4 12H20M12 4V20" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>

                </svg>
            </button>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <DataTable


                            >
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Win/Loss</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr  v-for="user in $page.props.users" :key="user.id">
                                        <td>{{user.name}}</td>
                                        <td>{{user.email}}</td>
                                        <td>{{user.phone}}</td>
                                        <td>{{user.id}}</td>
                                        <td>{{user.email}}</td>
                                        <td>
                                            <button class="">
                                                <svg width="2em" height="2em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#3a860d">

                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                                                    <g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#3a860d" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#3a860d" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </g>

                                                </svg>
                                            </button>
                                            &nbsp;
                                            &nbsp;
                                            <button>
                                                <svg width="2em" height="2em" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000">

                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                                                    <g id="SVGRepo_iconCarrier">

                                                        <path d="M779.5 1002.7h-535c-64.3 0-116.5-52.3-116.5-116.5V170.7h768v715.5c0 64.2-52.3 116.5-116.5 116.5zM213.3 256v630.1c0 17.2 14 31.2 31.2 31.2h534.9c17.2 0 31.2-14 31.2-31.2V256H213.3z" fill="#ea5f4a"/>

                                                        <path d="M917.3 256H106.7C83.1 256 64 236.9 64 213.3s19.1-42.7 42.7-42.7h810.7c23.6 0 42.7 19.1 42.7 42.7S940.9 256 917.3 256zM618.7 128H405.3c-23.6 0-42.7-19.1-42.7-42.7s19.1-42.7 42.7-42.7h213.3c23.6 0 42.7 19.1 42.7 42.7S642.2 128 618.7 128zM405.3 725.3c-23.6 0-42.7-19.1-42.7-42.7v-256c0-23.6 19.1-42.7 42.7-42.7S448 403 448 426.6v256c0 23.6-19.1 42.7-42.7 42.7zM618.7 725.3c-23.6 0-42.7-19.1-42.7-42.7v-256c0-23.6 19.1-42.7 42.7-42.7s42.7 19.1 42.7 42.7v256c-0.1 23.6-19.2 42.7-42.7 42.7z" fill="#d31005"/>

                                                    </g>

                                                </svg>
                                            </button>

                                        </td>


                                    </tr>
                                </tbody>

                            </DataTable>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <widget-container-modal/>
        <!-- Modal -->



    </div>
</template>
<script>
import {container} from "jenesius-vue-modal";
import {openModal} from "jenesius-vue-modal"
import CreatePlayer from "@/Components/Player/CreatePlayer.vue";
export default {
    props:['users'],
    data() {
        return {
            modalShow: true
        }
    },
    components:{
        WidgetContainerModal: container,
    },
    mounted() {
        console.log(this.$page.props.users)
    },

    methods:{
        save(e){
            this.modalShow = false
        },
        async create(){
            await  openModal(CreatePlayer, {
                // title: "Hello World!"
            });
        },
    }
}

</script>

