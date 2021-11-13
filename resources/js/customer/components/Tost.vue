<template>
    <div class="modal" id="modal-default-tost" tabindex="-1" role="dialog" style="margin-top: 10%">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="mr-auto">Order</strong>
                        <small>1 min ago</small>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        Order successfully added to favourite list.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                name: null,
            }
        },
        methods:{
            init(options) {
                this.name = options.name;
                this.modal = $("#modal-default-tost");
                this.open();
            },
            open() {
                this.modal.modal("show");
            },
        },
        created() {
            Event.listen("alert-tost-open", this.init);
        }
    }
</script>
