<template>
  <b-container fluid class="p-0 m-0">
    <!-- //****** Header Start ********************************************************* */ -->
    <b-row class="wrapper-login">
      <b-col class="bg-custom p-5" cols="12" sm="12" md="8">
        <b-row align-v="end" class="h-100">
          <b-col>
            <h1
              class="login-t title text-white h2 font-weight-bold"
              ref="title-login"
            >
              {{ transformToUpperCase }}
            </h1>
            <p class="paragraph-login text-justify text-white">
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

      <!-- //****** End *********************************************************************** -->

      <!-- //****** Login Start *********************************************************************** -->
      <b-col class="bg-custom-login p-5" cols="12" sm="12" md="4">
        <div align-h="center" class="pt-4 text-center">
          <div class="d-flex justify-content-center">
            <img
              src="../../assets/icons/loginIcons/login-icon.svg"
              alt="login icon"
              class="mr-3"
            />
            <h2 class="login-title font-weight-bold">Jobs Login</h2>
          </div>
          <small class="d-block mt-2 small-subtitle"
            >Login with your personal account</small
          >
        </div>

        <div class="mt-4">
          <b-form class="login-form">
            <b-form-group
              id="fieldset-1"
              label="Enter your Email"
              label-for="email"
              valid-feedback="Thank you!"
              :invalid-feedback="invalidFeedback"
              :state="state"
            >
              <!-- State: pone el input correcto -->
              <b-form-input
                id="email"
                v-model="email"
                :state="state"
                trim
                placeholder="Enter your Email"
                maxlength="60"
                class="my-2 p-2"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              id="fieldset-1"
              label="Enter your Email"
              label-for="email"
              valid-feedback="Thank you!"
              :invalid-feedback="invalidFeedback"
              :state="state"
            >
              <!-- State: pone el input correcto -->
              <b-form-input
                id="email"
                v-model="email"
                :state="state"
                trim
                placeholder="Enter your Email"
                maxlength="60"
                class="my-2 p-2"
              ></b-form-input>
            </b-form-group>

            <b-row align-h="center" class="form-links mt-3">
              <b-col cols="6" sm="6" md="6" lg="6">
                <input type="checkbox" name="remember" id="remember" />
                <label for="remember" class="ml-2">Remember Me</label>
              </b-col>
              <b-col
                cols="6"
                sm="6"
                md="6"
                lg="6"
                class="d-flex flex-row justify-content-end"
              >
                <b-button v-b-modal.forgetPassword>Forget Password?</b-button>

                <!-- Modal -->
                <b-modal
                  id="forgetPassword"
                  title="Enter your email"
                  description="lasdjflkasd"
                  hide-footer
                  centered
                >
                  <div class="pt-0 pb-4 px-4">
                    <header>
                      <!-- title and steps -->
                      <p>
                        Please check your email, in a few seconds we will be
                        send you a new link to you can restart the password.
                      </p>
                    </header>

                    <main>
                      <!-- Form -->
                      <b-form>
                        <b-form-group
                          id="fieldset-1"
                          label="Enter your Email"
                          label-for="email"
                          valid-feedback="Thank you!"
                          :invalid-feedback="invalidFeedback"
                          :state="state"
                        >
                          <!-- State: pone el input correcto -->
                          <b-form-input
                            id="email"
                            v-model="email"
                            :state="state"
                            trim
                            placeholder="Enter your Email"
                            maxlength="60"
                            class="my-2 p-2"
                          ></b-form-input>
                        </b-form-group>

                        <b-button-group
                          class="w-80 d-block text-center mt-4 p-2"
                        >
                          <b-button size="md" pill class="moda-button"
                            >Reset Password</b-button
                          >
                        </b-button-group>
                      </b-form>
                    </main>
                  </div>
                </b-modal>
                <!-- End Modal -->
              </b-col>
            </b-row>
          </b-form>
        </div>
      </b-col>
    </b-row>
    <!-- //****** End *********************************************************************** -->
  </b-container>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      loginTitle: "Login to you enjoy the best experience",
      modalShow: false,
    };
  },

  computed: {
    state() {
      return this.email.length >= 4;
    },
    //! Acá quede pendiente validar el input con expresion regular y proceder a realizar los otros campos del login.
    invalidFeedback() {
      if (this.email.length > 0) {
        return "Enter at least 4 characters.";
      }
      return "Please enter something.";
    },

    transformToUpperCase() {
      const textInArray = this.loginTitle.split(" ");
      let transformText = [];
      for (const word of textInArray) {
        if (word[0] != word[0].toUpperCase()) {
          let modifiedWord = word[0].toUpperCase() + word.substring(1);
          transformText.push(modifiedWord);
        } else {
          transformText.push(word);
        }
      }
      let result = transformText.join(" ");
      return result;
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
}

/****** Start ******************************* */
.bg-custom {
  background-image: linear-gradient(
      120deg,
      rgba(134, 21, 255, 0.5) 0%,
      rgba(134, 21, 255, 0.5) 100%
    ),
    url(../../assets/images/loginImg.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}

.border-down {
  display: block;
  margin: 1rem 0 0 0 !important;
  border-bottom: 2px solid rgba(255, 255, 255, 0.4);
}

.paragraph-login {
  font-size: 0.9rem;
  margin: 1rem 0 2rem 0 !important;
}
/****** End ******************************* */

/****** Login Start ******************************* */
.bg-custom-login {
  background-color: var(--background-white);
  padding: 3rem;
}

.login-title {
  font-size: 2rem;
  color: var(--main-color);
}

.small-subtitle {
  color: var(--very-dark);
  font-family: var(--font-family-roboto);
}
/****** End ******************************* */

.login-form b-form-group label {
  font-family: var(--font-family-roboto) !important;
  font-weight: 500 !important;
}

.was-validated .form-control:valid:focus,
.form-control.is-valid:focus {
  border: 1px solid var(--main-color);
  box-shadow: 0 0 0 0.2rem rgb(134 21 255 / 25%);
}
.was-validated .form-control:valid,
.form-control.is-valid {
  border-color: var(--second-color);
  background-image: url(../../assets/icons/loginIcons/check-icon.svg);
}

.was-validated .form-control:invalid,
.form-control.is-invalid {
  border-color: var(--danger-color);
  padding-right: calc(1.5em + 0.75rem);
  background-image: url(../../assets/icons/loginIcons/invalidated-icon.svg);
}

.was-validated .form-control:invalid:focus,
.form-control.is-invalid:focus {
  border-color: var(--secondary-danger-color);
  box-shadow: 0 0 0 0.2rem rgb(220 53 69 / 25%);
}

.moda-button {
  width: 50%;
  color: var(--color-white);
  background-color: var(--main-color);
}
</style>
