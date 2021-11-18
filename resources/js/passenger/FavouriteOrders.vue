<template>
    <div class="container" style="margin-left:8%">
        <div class="order-container justify-content-center">
            <div class="row">
                <div class="col-6">
                    <h3> Total Orders: <span class="badge badge-primary badge-pill">{{orderLength}}</span></h3><br>
                </div>
            </div>

            <div v-if="showLoading" style="text-align:center">
                <img :src="'/images/loader-gif.gif'" />
            </div>

            <div v-else class="row">
                <div class="col-4" style="margin-top:18px" v-for="(order, index) in allOrders" :key="index">
                    <div class="card"  style="margin-bottom:50px">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{index+1}}. {{order.order_name}}
                                    </h5>

                                    <label>
                                        <b>Placed:</b> {{order.created_at}}
                                    </label>

                                    <br>

                                    <label>
                                        <b>Amount:</b> {{order.amount}}
                                    </label>

                                    <br />

                                    <label>
                                        <b>Status:</b> confirmed
                                    </label>

                                    <hr />
                                     <button class="btn btn-outline-success" @click="viewOrder(order)">View</button>
                                    <button class="btn btn-outline-danger" @click="removeFavorites(order)">
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span v-if="orderLength == 0">Nothing Found</span>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data(){
            return {
               allOrders: [],
               showLoading: true,
               orderFilter: {
                   name: '',
                   type: 0,
               }
            }
        },
        computed: {
            orderLength() {
                return this.allOrders.length;
            }
        },
        methods:{
            init() {
                setTimeout(() => {
                    this.showLoading = true;
                    this.allOrders = [];
                    axios.get('/customer/favourit_order_list').then(response =>{
                        this.showLoading = false;
                        this.allOrders = response.data.orders;
                    }).catch((error) => {
                        this.showLoading = false;
                        console.log(error);
                    });
                }, 900);
            },
            
            viewOrder(order) {
                Event.fire('view-order', {
                    order: order,
                });
            },
            removeFavorites(order) {
                order.is_favourite = true;
                
                axios.post('/customer/remove_order_favourite', {
                    order: order.id,
                }).then(response =>{
                    swal({
                        title: "Success",
                        text: "Order successfully remove from favourite lists.",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    });
                    this.allOrders = response.data.orders;
                }).catch((error) => {
                    this.showLoading = false;
                    console.log(error);
                });
            }
        },
        mounted() {
            this.init();
        }
    }
</script>
