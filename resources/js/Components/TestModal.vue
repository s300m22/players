<script setup>
import {useForm} from '@inertiajs/vue3';
import {closeModal} from "jenesius-vue-modal";



</script>
<template>


    <div v-if="showModal" class="modalFileUploadButtonPrioritize pb-lg-5" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width:100%;border-radius: 25px;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="height: 91vh;overflow: scroll;">
                <div class="modal-header mb-2" style="border-bottom: solid 1px aliceblue;min-height: 7vh;" id="modal-header">

                    <h5 class="modal-title m-auto text-sm px-sm md:px-5 " id="exampleModalLongTitle" >Add New Member </h5>
                    <button type="button" class="h-auto  close" data-dismiss="modal" aria-label="Close" @click="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <li v-for="error in validationErrors" :key="error">
                    {{ error }}
                </li>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form @submit.prevent="submit">

                                <div class="form-group">
                                    <label for="FirstName">First Name</label>
                                    <input type="text" class="form-control" id="FirstName" aria-describedby="FirstName" placeholder="First Name" style="border:1px solid #ced4da !important;" v-model="form.first_name">

                                </div>

                                <button type="submit" class="btn btn-primary mt-3" :disabled="form.processing" style="background: blue;">Submit</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</template>
<script>
export default {
    props:['validationErrors'],

    data() {
        return {
            showModal: false,
            form: {
                // Initialize your form data
                first_name:'akram',
            },
        };
    },
    methods: {
        handleSubmit() {

        },
        closeModal() {
            this.showModal = false;
            this.$emit('closeModal'); // Emit an event to notify the parent about modal closure
        },
    },
};
</script>
