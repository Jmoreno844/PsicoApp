@extends('layout.main')
@section('psicologos')
<style>
    .card {
  border: 1px solid #ddd;
  border-radius: 15px;
  padding: 20px;
  display: flex;
  flex-direction: column; /* Cambia la dirección de flex a columna */
  align-items: center; /* Centra verticalmente */
  max-width: 400px;
  width: 95%;
  margin: 15px auto 0; /* Centra horizontalmente */
  background-color: #f9f9f9; /* Color de fondo para fines de visualización */
}

.card-title {
  font-size: 20px;
}

.card-content {
  display: flex;
  align-items: center;
}

.card-img-left {
  width: 30%;
  margin-right: 20px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.card-text-left {
  flex: 1;
}

.card-text-right {
  flex: 1;
}
</style>
<div class="card">
  <h5 class="card-title">Computador</h5>
  <div class="card-body">
    <div class="card-content">
      <img src="https://www.lifewire.com/thmb/WZdlwJIGSRA9Bkk7tKIj9Mgg-lk=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/xxl-desktop-pc-98013994-5c4dcc47c9e77c0001380389.jpg" class="card-img-left" alt="Imagen de la tarjeta">
      <p class="card-text-right">Texto a la derecha de la imagen.</p>
    </div>
  </div>
</div>

{{-- aca se agregaran los psicologos importados de la base de datos y se  pasaran por un for each --}}
@endsection
