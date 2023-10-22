<script setup>
import { ref } from "vue";
// import useAuth from "../composables/useAuth";
import { useRouter } from "vue-router";
import { useAuthStore } from "@/modules/auth/store/auth.js";
import Swal from "sweetalert2";

const step = ref(1);

const nameRules = [
  (value) => {
    if (value) return true;
    return "Name is required.";
  },
  (value) => {
    if (value?.length <= 40) return true;
    return "Name must be less than 40 characters.";
  },
  (value) => {
    if (/[^0-9]/.test(value)) return true;
    return "Last name can not contain digits.";
  },
];

const emailRules = [
  (value) => {
    if (value) return true;
    return "E-mail is required.";
  },
  (value) => {
    if (/.+@.+\..+/.test(value)) return true;
    return "E-mail must be valid.";
  },
];

const passwordRules = [
  (value) => {
    if (/^[A-Za-z]\w{7,14}$/.test(value)) return true;
    return "At least one capital letter, one capital letter and between 7 and 14 characters.";
  },
];

const store = useAuthStore();
const { createNewUser, loginUser } = store;
const router = useRouter();

// const { createNewUser } = useAuth();

const useFormRegister = ref({
  name: "Andres",
  email: "andres@gmail.com",
  password: "123456",
});

const useFormLogin = ref({
  email: "",
  password: "",
});

const onSubmitRegister = async () => {
  const resp = await createNewUser(useFormRegister.value);
  if (resp.status === 200) {
    const { isConfirmed } = await Swal.fire(
      "Registro",
      "Usuario registrado con éxito",
      "success"
    );
    if (isConfirmed) router.push({ name: "home" });
  }

  if (resp.message) Swal.fire("Error", resp.message, "error");
};

const onSubmitLogin = async () => {
  const resp = await loginUser(useFormLogin.value);
  if (resp.status === 200) router.push({ name: "home" });
  if (resp.message) Swal.fire("Error", resp.message, "error");
};

// const props = defineProps({
//   source: String,
// });
</script>
<template>
  <v-container class="fill-height" fluid>
    <v-row align="center" justify="center">
      <v-col cols="12" sm="8" md="8">
        <v-card class="elevation-5">
          <v-window v-model="step">
            <v-window-item :value="1">
              <v-row>
                <v-col cols="12" md="7">
                  <v-card-text class="mt-lg-10 mt-0 pa-10">
                    <h1 class="text-center display-2 teal--text text--accent-3 mb-5 text-h3">
                      ¡Bienvenido!
                    </h1>
                    <div class="text-center mt-4">
                      <v-btn class="mx-2" fab color="blue" outlined>
                        <v-icon>fab fa-facebook-f</v-icon>
                      </v-btn>
                      <v-btn class="mx-2" fab color="red" outlined>
                        <v-icon>fab fa-google-plus-g</v-icon>
                      </v-btn>
                      <v-btn class="mx-2" fab color="blue-lighten-2" outlined>
                        <v-icon>fab fa-linkedin-in</v-icon>
                      </v-btn>
                    </div>
                    <h4 class="mt-7 text-lg-body-1">
                      Ingresa tu email y tu contraseña
                    </h4>
                    <v-form @submit.prevent="onSubmitLogin">
                      <v-text-field v-model="useFormLogin.email" label="Email" name="Email" prepend-icon="far fa-envelope"
                        type="text" color="teal accent-3" :rules="emailRules" />

                      <v-text-field v-model="useFormLogin.password" id="password" label="Password" name="password"
                        prepend-icon="fas fa-lock" type="password" color="teal accent-3" :rules="passwordRules" />
                      <div class="d-flex justify-center mt-5">
                        <v-btn rounded color="primary" class="mb-4" dark type="submit">INGRESAR</v-btn>
                      </div>
                    </v-form>
                    <h3 class="text-center mt-4 text-lg-body-2">¿Olvidaste tu contraseña?</h3>
                  </v-card-text>
                  <div class="text-center mt-3"></div>
                </v-col>
                <v-col cols="12" md="5" class="teal accent-3 d-flex justify-center align-center">
                  <v-card-text class="white--text text-center d-flex flex-column">
                    <h1 class="mb-3 letter-spacing">Aun no eres miembro</h1>
                    <h2 class="text-body-1">Crea tu cuenta aquí</h2>
                    <div class="text-center mt-10">
                      <v-btn color="primary" rounded outlined dark @click="step++">REGISTRARME</v-btn>
                    </div>
                  </v-card-text>
                </v-col>
              </v-row>
            </v-window-item>
            <v-window-item :value="2">
              <v-row class="fill-height">
                <v-col cols="12" md="5" class="teal accent-3 d-flex justify-center align-center">
                  <v-card-text class="white--text mt-12 flex flex-column">
                    <h1 class="text-center text-h5 mb-3">
                      ¡Bienvenido nuevamente!
                    </h1>
                    <h2 class="text-center text-body-2 w-75 mx-auto" >
                      Para mantenerse conectado con nosotros, inicie sesión con
                      su información personal
                    </h2>
                    <div class="text-center mt-10">
                      <v-btn color="primary" rounded outlined dark @click="step--">INGRESAR</v-btn>
                    </div>
                  </v-card-text>
                </v-col>

                <v-col cols="12" md="7">
                  <v-card-text class="mt-lg-12">
                    <h1 class="text-center display-2 teal--text text--accent-3 mb-7">
                      Crear cuenta
                    </h1>
                    <div class="text-center mt-4">
                      <v-btn class="mx-2" fab color="blue" outlined>
                        <v-icon>fab fa-facebook-f</v-icon>
                      </v-btn>
                      <v-btn class="mx-2" fab color="red" outlined>
                        <v-icon>fab fa-google-plus-g</v-icon>
                      </v-btn>
                      <v-btn class="mx-2" fab color="blue-lighten-2" outlined>
                        <v-icon>fab fa-linkedin-in</v-icon>
                      </v-btn>
                    </div>
                    <h2 class="my-5 text-body-1">Ingresa tus datos</h2>
                    <v-form @submit.prevent="onSubmitRegister">
                      <v-text-field v-model="useFormRegister.name" label="Name" name="Name" prepend-icon="far fa-user"
                        type="text" color="teal accent-3" :rules="nameRules" />
                      <v-text-field v-model="useFormRegister.email" label="Email" name="Email"
                        prepend-icon="far fa-envelope" type="text" color="teal accent-3" :rules="emailRules" />

                      <v-text-field v-model="useFormRegister.password" id="password" clearable label="Password"
                        name="password" prepend-icon="fas fa-lock" type="password" color="teal accent-3"
                        :rules="passwordRules" />
                      <div class="d-flex justify-center mt-10">
                        <v-btn rounded color="primary" dark class="mb-4" type="submit">REGISTRARME</v-btn>
                      </div>
                    </v-form>
                  </v-card-text>
                </v-col>
              </v-row>
            </v-window-item>
          </v-window>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<style scoped></style>
