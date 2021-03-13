<template>
  <b-container fluid>
    <b-row class="wrapper-login">
      <b-col class="bg-custom p-5" cols="12" sm="12" md="8">
        <b-row align-v="end" class="h-100">
          <b-col>
            <h1 class="login-t itle">Login to you enjoy the best experience</h1>
            <p class="paragraph-login">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat
              dolorum sequi vel tenetur corrupti! Cumque sunt architecto
              nesciunt eveniet inventore minima quisquam laborum minus esse,
              temporibus sequi natus, enim voluptas ipsum at repellat. Provident
              blanditiis atque nam animi obcaecati! Atque ipsam molestiae
              explicabo exercitationem omnis quia aspernatur dicta at amet!
            </p>
            <span class="border-down"></span>
          </b-col>
        </b-row>
      </b-col>
      <!-- 
      <b-col class="h-100" cols="12" sm="12" md="4">
        <div align-h="center">
          <div>
            <span>Icon</span>
            <h2>Jobs Login</h2>
          </div>
          <small>Login with your personal account</small>
        </div>

        <div>
          <b-form-group
            id="fieldset-1"
            description="Let us know your name."
            label="Enter your name"
            label-for="input-1"
            valid-feedback="Thank you!"
            :invalid-feedback="invalidFeedback"
            :state="state"
          >
            <b-form-input
              id="input-1"
              v-model="name"
              :state="state"
              trim
            ></b-form-input>
          </b-form-group>
        </div>
      </b-col> -->
    </b-row>
  </b-container>
</template>

<script>
export default {
  data() {
    return {
      name: "",
    };
  },

  computed: {
    state() {
      return this.name.length >= 4;
    },
    invalidFeedback() {
      if (this.name.length > 0) {
        return "Enter at least 4 characters.";
      }
      return "Please enter something.";
    },
  },
};
</script>

<style scoped>
.wrapper-login {
  width: 100%;
  height: 100%;
  min-height: 100vh;
  margin: 0 auto;
  background: #ccc;
}

.bg-custom {
  background-image: url(../../assets/images/loginImg.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}

.border-down {
  display: block;
  margin: 1rem 0 0 0 !important;
  border-bottom: 2px solid rgba(255, 255, 255, 0.524);
}
</style>
