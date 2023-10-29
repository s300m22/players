<script setup>
import { Head, Link } from '@inertiajs/vue3';

</script>
<Head title="Leader | Players" />
<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <div class="row font-medium mt-10  text-center">
                <div class="col-lg-8 m-auto text-center">
                    <Link :href="route('profile')" style="outline:double; float: right">Back</Link>
                </div>
            </div>
            <div class="py-12">
                <h1 class="text-center font-medium mb-5" style="font-size: 25px;">list the members with the top 10 average scores, for those
                    members who have played at least 10 matches</h1>
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
                                    <th>Average Score</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr  v-for="member in members" :key="member.id">
                                    <td>{{ member.id }}</td>
                                    <td>{{ member.first_name + member.last_name }}</td>
                                    <td>{{ member.email }}</td>
                                    <td>{{ member.phone }}</td>
                                    <td style="color: green" v-if="member.average_score >= 50">{{ Math.round(member.average_score) }}</td>
                                    <td style="color: red" v-else-if="member.average_score < 50">{{ Math.round(member.average_score) }}</td>


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
    props:['members'],



}

</script>

