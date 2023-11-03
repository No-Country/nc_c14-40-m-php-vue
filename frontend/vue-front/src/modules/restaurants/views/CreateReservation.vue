<template>
  <div
    class="text-[2rem] text-center bg-[conic-gradient(at_right,_var(--tw-gradient-stops))] from-red-400 via-violet-200 to-orange-300 h-full text-orange-900"
  >
    <h2 class="font-bold text-orange-600" style="text-shadow: 1px 1px 1px black">
      ¡Reserva Creada!
    </h2>
    <img
      src="https://img.freepik.com/vector-premium/persona-feliz-sonriente-hace-gestos-dedo-arriba-guina-ojo-muestra-signo-pulgar-arriba-aprobacion_684413-181.jpg"
      alt="Persona Feliz"
      width="500"
      height="200"
      class="mx-auto rounded-full border-solid border-orange-500 border-[2px]"
    />
    <p>Nos comunicaremos contigo a tu correo para confirmar la reserva.</p>
    <p>El precio total es: {{ precioTotal }} USD</p>
    <p>Fecha de hoy: {{ fechaHoy }}</p>
  </div>
</template>
<script>
export default {
  data() {
    return {
      precioTotal: 50, // Reemplaza con el precio real de la reserva
      fechaHoy: new Date().toLocaleDateString(), // Obtiene la fecha actual en formato legible
    };
  },
};
</script>
