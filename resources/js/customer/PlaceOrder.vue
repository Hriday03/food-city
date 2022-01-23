<template>
  <div class="container">
    <div class="justify-content-center">
      <p style="color: red; text-align: center" v-if="errorMsg">
        Errors
        <span v-html="errorMsg"></span>
      </p>

      <p style="color: green; text-align: center" v-if="successMsg">
        {{ successMsg }}
      </p>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-10 card" style="padding: 15px; margin:4%">
        <div id="form">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input
              disabled
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Name"
              v-model="customer.name"
            />
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input
              disabled
              type="email"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Phone"
              v-model="customer.phone"
            />
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input
              disabled
              type="email"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Enter email"
              v-model="customer.email"
            />
            <small id="emailHelp" class="form-text text-muted">
              We'll never share your email with anyone else.
            </small>
          </div>

           <div class="form-group">
            <label for="exampleInputPassword1">Product</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputPassword1"
              placeholder="Enter your product name"
              v-model="customer.product"
            />
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Shop Address</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputPassword1"
              placeholder="Enter source shop address"
              v-model="customer.shop_address"
            />
          </div>

           <div class="form-group">
            <label for="exampleInputPassword1">Customer Address</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputPassword1"
              placeholder="Enter customer address"
              v-model="customer.customer_address"
            />
          </div>


          <button
            type="submit"
            class="btn btn-danger"
            @click="placeOrder()"
            :disabled="pageProgress"
          >
            <i
              class="fa fa-refresh fa-spin"
              style="font-size: 24px"
              v-if="pageProgress"
            ></i>
            Place Order
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["user"],
  data() {
    return {
      customer: {
        name: "",
        email: "",
        phone: "",
        product: "",
        shop_address: "",
        customer_address: "",
      },
      pageProgress: false,
      errorMsg: null,
      successMsg: null,
    };
  },
  methods: {
    loadData() {
      this.customer.name = this.user.name;
      this.customer.email = this.user.email;
      this.customer.phone = this.user.phone;
      this.customer.address = this.user.address;
    },
    placeOrder() {
      this.pageProgress = true;

      setTimeout(() => {
        axios.post("/customer/place_order_save", this.customer)
          .then((response) => {
            this.pageProgress = false;
            this.successMsg = "Place Order was successfully";
            this.errorMsg = null;

            setTimeout(() => {
              location.replace('/customer/order_history');
            })
          })
          .catch((error) => {
            this.successMsg = null;
            this.pageProgress = false;
            var errorString = "<ul>";
            if (error.response.status === 422) {
              var errors = error.response.data.errors;
              $.each(errors, function (key, value) {
                errorString += "<li>" + value + "</li>";
              });
            }
            errorString += "</ul>";
            this.errorMsg = errorString;
          });
      }, 500);
    },
  },
  mounted() {
    this.loadData();
  },
};
</script>