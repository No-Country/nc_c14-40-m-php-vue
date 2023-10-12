<script setup>
import { ref } from "vue";

const step = ref(1);

// const props = defineProps({
//   source: String,
// });
</script>

<template>
  <v-container class="fill-height" fluid>
    <v-row align="center" justify="center">
      <v-col cols="12" sm="8" md="8">
        <v-card class="elevation-12">
          <v-window v-model="step">
            <v-window-item :value="1">
              <v-row>
                <v-col cols="12" md="8">
                  <v-card-text class="mt-12">
                    <h1 class="text-center display-2 teal--text text--accent-3">
                      ¡Bienvenido!
                    </h1>
                    <div class="text-center mt-4">
                      <v-btn class="mx-2" fab color="black" outlined>
                        <v-icon>fab fa-facebook-f</v-icon>
                      </v-btn>
                      <v-btn class="mx-2" fab color="black" outlined>
                        <v-icon>fab fa-google-plus-g</v-icon>
                      </v-btn>
                      <v-btn class="mx-2" fab color="black" outlined>
                        <v-icon>fab fa-linkedin-in</v-icon>
                      </v-btn>
                    </div>
                    <h4 class="text-center mt-4">
                      Ingresa tu email y tu contraseña
                    </h4>
                    <v-form>
                      <v-text-field
                        label="Email"
                        name="Email"
                        prepend-icon="email"
                        type="text"
                        color="teal accent-3"
                      />

                      <v-text-field
                        id="password"
                        label="Password"
                        name="password"
                        prepend-icon="lock"
                        type="password"
                        color="teal accent-3"
                      />
                    </v-form>
                    <h3 class="text-center mt-4">¿Olvidaste tu contraseña?</h3>
                  </v-card-text>
                  <div class="text-center mt-3">
                    <v-btn rounded color="amber-darken-3" class="mb-4" dark
                      >INGRESAR</v-btn
                    >
                  </div>
                </v-col>
                <v-col cols="12" md="4" class="teal accent-3">
                  <v-card-text class="white--text mt-12">
                    <h1 class="text-center display-1">Aun no eres miembro</h1>
                    <h5 class="text-center">Crea tu cuenta aquí</h5>
                  </v-card-text>
                  <div class="text-center">
                    <v-btn rounded outlined dark @click="step++"
                      >REGISTRARME</v-btn
                    >
                  </div>
                </v-col>
              </v-row>
            </v-window-item>
            <v-window-item :value="2">
              <v-row class="fill-height">
                <v-col cols="12" md="4" class="teal accent-3">
                  <v-card-text class="white--text mt-12">
                    <h1 class="text-center display-1">
                      ¡Bienvenido nuevamente!
                    </h1>
                    <h5 class="text-center">
                      Para mantenerse conectado con nosotros, inicie sesión con
                      su información personal
                    </h5>
                  </v-card-text>
                  <div class="text-center">
                    <v-btn rounded outlined dark @click="step--"
                      >INGRESAR</v-btn
                    >
                  </div>
                </v-col>

                <v-col cols="12" md="8">
                  <v-card-text class="mt-12">
                    <h1 class="text-center display-2 teal--text text--accent-3">
                      Crear cuenta
                    </h1>
                    <div class="text-center mt-4">
                      <v-btn class="mx-2" fab color="black" outlined>
                        <v-icon>fab fa-facebook-f</v-icon>
                      </v-btn>

                      <v-btn class="mx-2" fab color="black" outlined>
                        <v-icon>fab fa-google-plus-g</v-icon>
                      </v-btn>
                      <v-btn class="mx-2" fab color="black" outlined>
                        <v-icon>fab fa-linkedin-in</v-icon>
                      </v-btn>
                    </div>
                    <h4 class="text-center mt-4">Ingresa tus datos</h4>
                    <v-form>
                      <v-text-field
                        label="Name"
                        name="Name"
                        prepend-icon="person"
                        type="text"
                        color="teal accent-3"
                      />
                      <v-text-field
                        label="Email"
                        name="Email"
                        prepend-icon="email"
                        type="text"
                        color="teal accent-3"
                      />

                      <v-text-field
                        id="password"
                        label="Password"
                        name="password"
                        prepend-icon="lock"
                        type="password"
                        color="teal accent-3"
                      />
                    </v-form>
                  </v-card-text>
                  <div class="text-center mt-n5">
                    <v-btn rounded color="amber-darken-3" dark class="mb-4"
                      >REGISTRARME</v-btn
                    >
                  </div>
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
