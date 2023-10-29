<template>

    <div class="modalFileUploadButtonPrioritize pb-lg-5" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width:100%;border-radius: 25px;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header mb-2" style="border-bottom: solid 1px aliceblue;min-height: 7vh;" id="modal-header">

                    <h5 class="modal-title m-auto text-sm px-sm md:px-5 " id="exampleModalLongTitle" >Prioritize</h5>
                    <button type="button" class="h-auto  close" data-dismiss="modal" aria-label="Close" @click="close">
                        <span aria-hidden="true" style="">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form>

                                <div class="form-group">
                                    <label for="LastName">Last Name</label>
                                    <input type="text" class="form-control" id="LastName" aria-describedby="LastNameHelp" placeholder="Last Name" style="border:1px solid #ced4da !important;">

                                </div>
                                <div class="form-group">
                                    <label for="Phone">Phone</label>
                                    <input type="text" class="form-control" id="Phone" aria-describedby="PhoneHelp" placeholder="Phone" style="border:1px solid #ced4da !important;">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" style="border:1px solid #ced4da !important;">

                                </div>

                                <br>
                                <div class="form-group">

                                    <label for="street_name">Street name/House Number</label>
                                    <input type="text" class="form-control" id="street_name" aria-describedby="street_name" placeholder="Street name" style="border:1px solid #ced4da !important;">

                                </div>
                                <div class="form-group">

                                    <label for="city">City/Town</label>
                                    <input type="text" class="form-control" id="city" aria-describedby="city" placeholder="City/Town" style="border:1px solid #ced4da !important;">

                                </div>
                                <div class="form-group">

                                    <label for="city">Country</label>
                                    <input type="text" class="form-control" id="country" aria-describedby="country" placeholder="Country" style="border:1px solid #ced4da !important;">

                                </div>



                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</template>
<style>

</style>
