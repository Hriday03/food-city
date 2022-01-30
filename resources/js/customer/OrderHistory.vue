<template>
    <div class="container" style="margin-left:8%">
        <div class="order-container justify-content-center">
            <div class="row">
                <div class="col-6">
                    <h3> Total Orders: <span class="badge badge-primary badge-pill">{{orderLength}}</span></h3><br>
                </div>
                <div class="col-2">
                </div>
                <div class="col-4">
                    <select class="form-control" v-model="orderFilter.type" @change="init()">
                        <option value="1">Active Orders</option>
                        <option value="2">Delivered Orders</option>
                    </select>
                </div>
            </div>

            <div v-if="showLoading" style="text-align:center">
                <img :src="'/images/loader-gif.gif'" />
            </div>

            <div v-else class="row">
                <div class="col-12">
                    <input type="text" style="height:46px" class="form-control" placeholder="Search by order name" @change="filterOrder()" v-model="orderFilter.name">
                </div>
                <div class="col-4" v-show="order.visible" style="margin-top:18px" v-for="(order, index) in allOrders" :key="index">
                    <div class="card" style="margin-bottom:50px">
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
                                        <b>Amount:</b> COD
                                    </label>

                                    <br />

                                    <label v-if="order.delivered_at">
                                        <b>Status:</b> Delivered
                                    </label>

                                    <hr />
                                    <button class="btn btn-outline-success" @click="viewOrder(order)">Track</button>
                                    
                                    <button class="btn btn-outline-danger" v-if="order.is_favourite != 1 && !order.delivered_at" @click="addToFavorites(order)">
                                        <i class="fa fa-heart-o" style="font-size:18px;color:red"></i>
                                    </button>

                                    <button style="float:right" class="btn btn-outline-success" v-if="order.customer_received == null" @click="accept(order)">
                                        <i class="fa fa-thumbs-o-up" style="font-size:18px;color:green"></i> Accept
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
                   type: 1,
               }
            }
        },
        computed: {
            orderLength() {
                var len = 0;
                this.allOrders.forEach((order) => {
                    if (order.visible) {
                        len ++;
                    }
                });
                return len;
            }
        },
        methods:{
            init() {
                setTimeout(() => {
                    this.showLoading = true;
                    this.allOrders = [];
                    axios.get('/customer/search_orders', {
                        params: {
                            'order_type': this.orderFilter.type,
                        }
                    }).then(response =>{
                        this.showLoading = false;
                        this.allOrders = this.prepareorders(response.data.orders);
                    }).catch((error) => {
                        this.showLoading = false;
                        console.log(error);
                    });
                }, 900);
            },
            prepareorders(orders) {
                if (orders.length == 0) {
                    return [];
                }

                orders.forEach(order => {
                    order.visible = true;
                });

                return orders;
            },
            filterOrder() {
                var orderName = this.orderFilter.name.toString().toLowerCase();
                if (orderName == '') {
                    this.allOrders.forEach(order => {
                        order.visible = true;
                    });
                } else {
                    this.allOrders.forEach(order => {
                        if (order.order_name.toLowerCase().match(orderName) != null) {
                            order.visible = true;
                        } else {
                            order.visible = false;
                        }
                    });
                }
            },
            viewOrder(order) {
                Event.fire('view-order', {
                    order: order,
                });
            },
            addToFavorites(order) {
                order.is_favourite = true;
                
                axios.post('/customer/order_favourite', {'order': order.id,}).then(response =>{
                    swal({
                        title: "Success",
                        text: "Order successfully added into favourite lists.",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    }).then(() => {
                        location.reload();
                    });;
                }).catch((error) => {
                    this.showLoading = false;
                    console.log(error);
                });
            },
            accept(order) {
                 axios.post('/customer/add_points', {'order': order.id,}).then(response =>{
                    swal({
                        title: "Success",
                        text: "Thanks!",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    });
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
