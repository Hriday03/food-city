<template>
    <div class="modal" id="modal-default" tabindex="-1" role="dialog" style="margin-top: 10%">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Track - {{order.order_name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h5 class="modal-title" v-if="order.order_partner_name">Delivery Partner:</h5>
                        <label>
                            {{order.order_partner_name}} <span v-if="order.order_partner_phone">,</span>  {{order.order_partner_phone}}
                        </label>
                        <div class="row">
                            <div class="col-md-10">
                                <ul class="timeline">
                                    <li>
                                        <a target="_blank" href="#">{{order.created_at}}</a>
                                        <p>Order Placed</p>
                                    </li>
                                    <li v-if="order.confirm_at">
                                        <a href="#">{{order.confirm_at}}</a>
                                        <p>Confirmed</p>
                                    </li>
                                    <li v-if="order.pickup_at">
                                        <a href="#">{{order.pickup_at}}</a>
                                        <p>Order Pickuped</p>
                                    </li>
                                     <li v-if="order.delivered_at">
                                        <a href="#">{{order.delivered_at}}</a>
                                        <p>Delivered</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style  scoped>
ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: green;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid green;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
</style>
<script>
    export default {
        data(){
            return {
                order: {},
            }
        },
        methods:{
            init(options) {
                this.order = options.order;
                this.modal = $("#modal-default");
                this.open();
            },
            open() {
                this.modal.modal("show");
            },
        },
        created() {
            Event.listen("view-order", this.init);
        }
    }
</script>
