<template>
  <div class="container">
    <div class="justify-content-center">
      <p style="color: red; text-align:center" v-if="errorMsg">
        Errors
        <span v-html="errorMsg"></span>
      </p>

      <p style="color: green; text-align:center" v-if="successMsg">
        {{ successMsg }}
      </p>
    </div>

    <div class="row justify-content-center" style="margin-left: 7%">
      <div class="col-md-12" style="padding: 15px">
        <div id="form">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Name"
              v-model="passenger.name"
            />
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input
              type="email"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Phone"
              v-model="passenger.phone"
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
              v-model="passenger.email"
            />
            <small id="emailHelp" class="form-text text-muted">
              We'll never share your email with anyone else.
            </small>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputPassword1"
              placeholder="Address"
              v-model="passenger.address"
            />
          </div>
          <button
            type="submit"
            class="btn btn-danger"
            @click="updateProfile()"
            :disabled="pageProgress"
          >
            <i
              class="fa fa-refresh fa-spin"
              style="font-size: 24px"
              v-if="pageProgress"
            ></i>
            Update Profile
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
      passenger: {
        name: "",
        email: "",
        phone: "",
        address: "",
      },
      pageProgress: false,
      errorMsg: null,
      successMsg: null,
    };
  },
  methods: {
    loadData() {
      this.passenger.name = this.user.name;
      this.passenger.email = this.user.email;
      this.passenger.phone = this.user.phone;
      this.passenger.address = this.user.address;
    },
    updateProfile() {
      this.pageProgress = true;

      setTimeout(() => {
        axios
        .post("/passenger/update_profile", this.passenger)
        .then((response) => {
          this.pageProgress = false;
          this.successMsg = "Succesfully updated profile";
          this.errorMsg = null;
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