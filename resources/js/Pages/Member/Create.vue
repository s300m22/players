<script setup>
import { Head ,Link } from '@inertiajs/vue3';
</script>
<Head title="Players | Create Member" />
<template>

    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

            <div class="py-12">
                <div class="row font-medium mt-10  text-center">
                    <div class="col-lg-8 m-auto text-center">
                        <Link :href="route('profile')" style="outline:double; float: right">Back</Link>
                    </div>
                </div>
                <h1 class="text-center font-medium" style="font-size: 25px;">Create / Edit Member</h1>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#member">
                        <svg width="2em" height="2em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                            <g id="SVGRepo_iconCarrier"> <path d="M4 12H20M12 4V20" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>

                        </svg>
                    </button>

                    <div class=" alert alert-success text-center" v-if="$page.props.flash.message">
                        {{$page.props.flash.message}}
                    </div>
                    <br>
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
                                    <th>Adress</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr  v-for="member in members" :key="member.id">
                                    <td>{{ member.id }}</td>
                                    <td>{{ member.first_name + ' ' + member.last_name }}</td>
                                    <td>{{ member.email }}</td>
                                    <td>{{ member.phone }}</td>
                                    <td>{{ member.street + member.city + ' ' + member.state  + ' ' +  member.zip_code  + ' ' +  member.country}}</td>
                                    <td >
                                        <button  @click="openM(member)">
                                            <svg @click="openM(member)" width="2em" height="2em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#3a860d">

                                                <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                                                <g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#3a860d" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#3a860d" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </g>

                                            </svg>
                                        </button>
                                        &nbsp;

                                    </td>


                                </tr>
                                </tbody>

                            </DataTable>
                        </div>
                    </div>
                </div>
            </div>
<!--            <widget-container-modal/>-->
            <!-- Modal -->
            <div class="modal fade" id="member" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form @submit.prevent="submit">

                                        <div class="form-group">
                                            <label for="FirstName">First Name</label>
                                            <input type="text"  class="form-control" id="FirstName" aria-describedby="FirstName" placeholder="First Name" style="border:1px solid #ced4da !important;" v-model="form.first_name">

                                        </div>
                                        <p class="mt-1 text-sm text-red-600" v-if="errors.first_name">
                                            {{ errors.first_name }}
                                        </p>
                                        <div class="form-group">
                                            <label for="LastName">Last Name</label>
                                            <input type="text"  class="form-control" id="LastName" aria-describedby="LastNameHelp" placeholder="Last Name" style="border:1px solid #ced4da !important;" v-model="form.last_name">

                                        </div>
                                        <p class="mt-1 text-sm text-red-600" v-if="errors.last_name">
                                            {{ errors.last_name }}
                                        </p>
                                        <div class="form-group">
                                            <label for="Phone">Phone</label>
                                            <input type="text"  class="form-control" id="Phone" aria-describedby="PhoneHelp" placeholder="Phone" style="border:1px solid #ced4da !important;" v-model="form.phone">

                                        </div>
                                        <p class="mt-1 text-sm text-red-600" v-if="errors.phone">
                                            {{ errors.phone }}
                                        </p>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email"   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" style="border:1px solid #ced4da !important;"  v-model="form.email">

                                        </div>
                                        <p class="mt-1 text-sm text-red-600" v-if="errors.email">
                                            {{ errors.email }}
                                        </p>

                                        <p class="mt-3 mb-2 font-medium">Optional </p>
                                        <div class="form-group">

                                            <label for="street_name">Street name</label>
                                            <input type="text" class="form-control" id="street_name" aria-describedby="street_name" placeholder="Street name" style="border:1px solid #ced4da !important;"  v-model="form.street">

                                        </div>
                                        <div class="form-group">

                                            <label for="city">City/Town</label>
                                            <input type="text" class="form-control" id="city" aria-describedby="city" placeholder="City/Town" style="border:1px solid #ced4da !important;"  v-model="form.city">

                                        </div>

                                        <div class="form-group">

                                            <label for="sate">State</label>
                                            <input type="text" class="form-control" id="state" aria-describedby="state" placeholder="state" style="border:1px solid #ced4da !important;"  v-model="form.state">

                                        </div>
                                        <div class="form-group">

                                            <label for="zip_code">Zip Code</label>
                                            <input type="text" class="form-control" id="zip_code" aria-describedby="zip_code" placeholder="zip_code" style="border:1px solid #ced4da !important;"  v-model="form.zip_code">

                                        </div>

                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" id="country" aria-describedby="country" placeholder="Country" style="border:1px solid #ced4da !important;"  v-model="form.country">

                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button  class="btn btn-primary" :disabled="form.processing">Save changes</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="modal" :id="'member_edit_' + member_id" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form @submit.prevent="submitEdit">

                                        <div class="form-group">
                                            <label for="FirstName">First Name</label>
                                            <input type="text" required class="form-control" id="FirstName" aria-describedby="FirstName" placeholder="First Name" style="border:1px solid #ced4da !important;" v-model="edit_form.first_name">

                                        </div>
                                        <p class="mt-1 text-sm text-red-600" v-if="errors.first_name">
                                            {{ errors.first_name }}
                                        </p>
                                        <div class="form-group">
                                            <label for="LastName">Last Name</label>
                                            <input type="text" required class="form-control" id="LastName" aria-describedby="LastNameHelp" placeholder="Last Name" style="border:1px solid #ced4da !important;" v-model="edit_form.last_name">

                                        </div>
                                        <p class="mt-1 text-sm text-red-600" v-if="errors.last_name">
                                            {{ errors.last_name }}
                                        </p>
                                        <div class="form-group">
                                            <label for="Phone">Phone</label>
                                            <input type="text" required class="form-control" id="Phone" aria-describedby="PhoneHelp" placeholder="Phone" style="border:1px solid #ced4da !important;" v-model="edit_form.phone">

                                        </div>
                                        <p class="mt-1 text-sm text-red-600" v-if="errors.phone">
                                            {{ errors.phone }}
                                        </p>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email"   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" style="border:1px solid #ced4da !important;"  v-model="edit_form.email">

                                        </div>
                                        <p class="mt-1 text-sm text-red-600" v-if="errors.email">
                                            {{ errors.email }}
                                        </p>

                                        <p class="mt-3 mb-2 font-medium">Optional </p>
                                        <div class="form-group">

                                            <label for="street_name">Street name</label>
                                            <input type="text" class="form-control" id="street_name" aria-describedby="street_name" placeholder="Street name" style="border:1px solid #ced4da !important;"  v-model="edit_form.street">

                                        </div>
                                        <div class="form-group">

                                            <label for="city">City/Town</label>
                                            <input type="text" class="form-control" id="city" aria-describedby="city" placeholder="City/Town" style="border:1px solid #ced4da !important;"  v-model="edit_form.city">

                                        </div>

                                        <div class="form-group">

                                            <label for="sate">State</label>
                                            <input type="text" class="form-control" id="state" aria-describedby="state" placeholder="state" style="border:1px solid #ced4da !important;"  v-model="edit_form.state">

                                        </div>
                                        <div class="form-group">

                                            <label for="zip_code">Zip Code</label>
                                            <input type="text" class="form-control" id="zip_code" aria-describedby="zip_code" placeholder="zip_code" style="border:1px solid #ced4da !important;"  v-model="edit_form.zip_code">

                                        </div>

                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" id="country" aria-describedby="country" placeholder="Country" style="border:1px solid #ced4da !important;"  v-model="edit_form.country">

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: rgb(108, 117, 125)">Cancel</button>
                                            <button  class="btn btn-primary" :disabled="form.processing">Save changes</button>
                                        </div>
                                    </form>
                                </div>

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
    props:['members','message'],
    data() {
        return {
            member_id:'',
            edit_form:Array,
            flashMessage: null,
            form:{
                first_name:'',
                last_name:'',
                phone: '',
                email: '',
                street: '',
                city: '',
                state: '',
                zip_code: '',
                country: '',


            },

        };
    },
    mounted() {

    },
    components:{
    },
    computed:{
        errors(){
            return this.$page.props.errors;
        },
    },

    methods:{

        openM(member){
            this.edit_form = member
            this.member_id  = member.id
            $j('#member_edit_' + member.id).modal('show');
        },
        submit() {

            console.log( this.$attrs.flash.message)
            this.$inertia.post(route('member.store'),this.form, {
                onFinish: () => {

                },
                onSuccess:() => {
                    if(this.$attrs.flash.message){
                        $j('#member').modal('hide');
                        window.location.href = route('member.create')
                    }


                },
                onError:() => {

                }

            });
        },
        submitEdit() {

            console.log( this.$attrs.flash.message)
            this.$inertia.post(route('member.update'),this.edit_form, {
                onFinish: () => {

                },
                onSuccess:() => {
                    if(this.$attrs.flash.message){

                        $j('#member_edit_' + this.edit_form.id).modal('hide');
                        window.location.href = route('member.create')
                    }


                },
                onError:() => {

                }

            });
        },


    }
}

</script>

