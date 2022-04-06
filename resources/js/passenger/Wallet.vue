<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Payment Details
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                        <div class="form-group">
                            <label for="cardNumber">
                                CARD NUMBER</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                    required autofocus />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            </div>
                        </div>
                                    
                        <label for="expityMonth">EXPIRY DATE</label>
                        <div class="row">
                            <div class="col-xs-7 col-md-7" style="margin-left: -15px;">
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityYear" placeholder="YY" required />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right" style="margin-top: -26px;">
                                <div class="form-group">
                                    <label for="cvCode">
                                        CV CODE</label>
                                    <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active">
                        <a href="#">
                            <span class="badge pull-right">
                                INR {{formattedAmount}} /-
                            </span> 
                            Redeem amount
                        </a>
                    </li>
                </ul>
                <br/>
                <button :disabled="(formattedAmount <= 0)" class="btn btn-success btn-lg btn-block" @click="redeem()" role="button">
                      <i class="fa fa-refresh fa-spin" style="font-size: 24px" v-if="pageProgress"></i>
                        Click to proceed
                </button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['formattedAmount'],
        data() {
            return{
                pageProgress: false
            }
        },
        methods: {
            redeem() {
                this.pageProgress = true;
                axios.post('/passenger/wallet_redeem').then(response =>{
                    this.pageProgress = false;
                    swal({
                        title: "Success",
                        text: "Redeem successfully",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    }).then(() => {
                        location.reload();
                    });
                }).catch((error) => {
                    this.pageProgress = false;
                    console.log(error);
                });   
            }
        }
    }
</script>
