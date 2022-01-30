<template>
    <div class="container" style="margin-left:8%">
        <div v-if="!showContent">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Source city</label>
                        <input
                            type="text"
                            class="form-control"
                            id="exampleInputPassword1"
                            placeholder="Source"
                            v-model="enterSourceCity"
                            required
                        />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Destination city</label>
                        <input
                            type="text"
                            class="form-control"
                            id="exampleInputPassword1"
                            placeholder="Destination"
                            v-model="enterDestinationCity"
                            required
                        />
                    </div>
                </div>
            </div>

            <button
                type="submit"
                class="btn btn-danger"
                @click="fetchOrders()"
                :disabled="pageProgress"
            >
                <i
                class="fa fa-refresh fa-spin"
                style="font-size: 24px"
                v-if="pageProgress"
                ></i>
                Check Orders
            </button>
        </div>

        <div v-else class="order-container justify-content-center">
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

                                    <label>
                                        <b>Source:</b> {{order.shop_address}}
                                    </label>

                                    <br>
                                    <label>
                                        <b>Destination:</b> {{order.customer_address}}
                                    </label>
                                    <br>

                                    <label>
                                        <b>Amount:</b> COD
                                    </label>

                                    <br />

                                    <label>
                                        <b>Status:</b> 
                                        <span v-if="order.created_at && !order.confirm_at">Placed</span>
                                        <span v-if="order.confirm_at && !order.pickup_at">Confirmed</span>
                                        <span v-if="order.pickup_at && !order.delivered_at">Pickuped</span>
                                        <span v-if="order.delivered_at">Delivered</span>
                                    </label>

                                    <hr v-if="!order.delivered_at"/>
                                    <button class="btn btn-outline-success" @click="confirmed(order)" v-if="!order.delivered_at">
                                        <span v-if="!order.confirm_at">Confirmed</span>
                                        <span v-if="order.confirm_at && !order.pickup_at && !order.delivered_at">Pickuped</span>
                                        <span v-if="order.confirm_at && order.pickup_at && !order.delivered_at">Delivered</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span v-if="orderLength == 0">Nothing Found</span>
                </div>
            </div>
        </div>


        <hr>
        <!-- Confirmed Orders -->
        <h3>Confirmed Orders</h3>
        <div style="margin-bottom:50px">
            <div class="row no-gutters">
                <div class="col-md-4" v-for="(order, key) in confirmedOrders" :key="key">
                    <div class="card"  style="padding: 10px">
                        <h5 class="card-title">
                            {{key+1}}. {{order.order_name}}
                        </h5>

                        <label>
                            <b>Placed:</b> {{order.created_at}}
                        </label>

                        <label>
                            <b>Source:</b> {{order.shop_address}}
                        </label>

                        <label>
                            <b>Destination:</b> {{order.customer_address}}
                        </label>
                      
                        <label>
                            <b>Amount:</b> COD
                        </label>

                        <label>
                            <b>Status:</b> 
                            <span v-if="order.created_at && !order.confirm_at">Placed</span>
                            <span v-if="order.confirm_at && !order.pickup_at">Confirmed</span>
                            <span v-if="order.pickup_at && !order.delivered_at">Pickuped</span>
                            <span v-if="order.delivered_at">Delivered</span>
                        </label>

                        <hr v-if="!order.delivered_at"/>
                        <button class="btn btn-outline-success" @click="confirmed(order)" v-if="!order.delivered_at">
                            <span v-if="!order.confirm_at">Confirmed</span>
                            <span v-if="order.confirm_at && !order.pickup_at && !order.delivered_at">Pickuped</span>
                            <span v-if="order.confirm_at && order.pickup_at && !order.delivered_at">Delivered</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        props:['confirmedOrders'],
        data(){
            return {
                enterSourceCity: null,
                enterDestinationCity: null,
                showContent: false,
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
                    axios.get('/passenger/search_orders', {
                        params: {
                            'enterSourceCity': this.enterSourceCity,
                            'enterDestinationCity': this.enterDestinationCity,
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
            confirmed(order) {
                order.is_favourite = true;
                
                axios.post('/passenger/change_order_status', {
                    'order': order.id,
                }).then(response => {
                    this.order = response.data.order;
                    swal({
                        title: "Success",
                        text: "Order status successfully changed.",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    }).then(() => {
                        location.reload();
                    });
                }).catch((error) => {
                    this.showLoading = false;
                    console.log(error);
                });
            },
            fetchOrders() {
                if (this.enterSourceCity == null || this.enterDestinationCity == null) {
                    alert('Please Enter Source & Destination');
                    return;
                }

                this.showContent = true;
                this.init();
            },
        },
        mounted() {
            //this.init();
        }
    }
</script>
