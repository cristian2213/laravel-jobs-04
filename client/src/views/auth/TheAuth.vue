<template>
  <div class="row">
    <div class="col-12 col-sx-6">
      <h1 class="display-4">Sign up</h1>
      <p>Sign up to have access to all our offers</p>

      <b-form>
        <b-form-group
          id="fieldset-1"
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
      </b-form>
    </div>
  </div>
</template>

<script>
export default {
  name: "AuthComponent",
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

<style>
</style>