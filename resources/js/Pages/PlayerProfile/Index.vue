<script setup>
import { Head,Link } from '@inertiajs/vue3';

</script>
<Head title="Players | Profile" />
<template>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <div class="py-12">

            <h1 class="text-center font-medium" style="font-size: 25px;">Profile</h1>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="row m-auto text-center font-medium">
                            <div class="col-lg-3 alert alert-success  m-auto">
                                <h6>Number of Win</h6>
                                <p>{{num_win}}</p>
                            </div>
                            <div class="col-lg-3 alert alert-danger m-auto">
                                <h6>Number of Loss</h6>
                                <p>{{num_loss}}</p>
                            </div>

                            <div class="col-lg-3 alert alert-info  m-auto" v-if="average_score >= 50">
                                <h6>Average Score</h6>
                                <p>{{average_score}}</p>
                            </div>
                            <div class="col-lg-3 alert alert-danger  m-auto" v-else-if="average_score < 50">
                                <h6>Average Score</h6>
                                <p>{{average_score}}</p>
                            </div>
                        </div>
                        <div class="row mt-5 ">
                            <div class="col-lg-3 m-auto text-center font-medium">
                                <h3>Highest score</h3>
                            </div>
                        </div>

                        <div class="row mt-3 alert alert-success ">
                            <div class="col-lg-9 m-auto">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Match Date</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Against</th>
                                        <th scope="col">Score</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ highest_score.first_name + highest_score.last_name  }}</td>
                                        <td>{{highest_score.match_date}}</td>
                                        <td>{{highest_score.location}}</td>
                                        <td>{{highest_score.against}}</td>
                                        <td>{{highest_score.score}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row font-medium mt-10  text-center">
                            <div class="col-lg-3 m-auto text-center">
                                <Link :href="route('profile')" style="outline:double">Profile</Link>
                            </div>
                            <div class="col-lg-3 m-auto text-center">
                                <Link :href="route('member.create')"  style="outline:double">Members / Create / Edit</Link>
                            </div>
                            <div class="col-lg-3 m-auto text-center  text-center" >
                                <Link :href="route('leader.list')" style="outline:double">Leader</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</template>
<script>
export default {
    props:['num_win','num_loss','highest_score','average_score']
}
</script>
