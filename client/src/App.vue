<template>
  <b-container id="app" fluid>
    <router-view></router-view>
  </b-container>
</template>

<style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;900&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap");
:root {
  --font-family-roboto: "Roboto", sans-serif;
  --main-color: #8615ff;
  --second-color: #8d23ff;
  --background-white: #f6fbff;
  --very-dark: #000000;
  --danger-color: #ff3f68;
  --secondary-danger-color: #ff5d80;
}

* {
  margin: 0 !important;
  padding: 0 !important;
  box-sizing: border-box;
  text-decoration: none;
  list-style: none;
}

body {
  height: 100% !important;
  font-family: "Montserrat", sans-serif;
}

form div > label {
  font-size: 0.9rem !important;
}

form div > input,
form div > input::placeholder {
  font-family: var(--font-family-roboto) !important;
  font-size: 0.8rem !important;
}

.valid-feedback {
  color: var(--main-color) !important;
}

.invalid-feedback {
  color: var(--danger-color) !important;
}
</style>
