@extends('layouts.navbarkasir')
@section('content')
<style>
    /* Form Pendaftaran Member - Styling Only */
/* Form Pendaftaran Member - Ditempatkan di Tengah */
.form-container {
  background-color: #b9d1e6; /* Biru muda */
  padding: 40px;
  margin: 0;
  width: 90%;
  border-radius: 20px;
  width: 100%;
  max-width: 600px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  
  /* Penempatan di tengah */
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  
  /* Jika ingin lebih aman di dalam container, gunakan ini instead: */
  /* 
  margin: auto;
  position: relative;
  */
}

.form-title {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 25px;
  color: #333;
  letter-spacing: 0.5px;
}

.input-group {
  margin-bottom: 20px;
}

.input-group label {
  display: block;
  font-size: 14px;
  margin-bottom: 8px;
  color: #333;
  font-weight: 500;
}

.input-field {
  width: 100%;
  padding: 12px 16px;
  border: none;
  border-radius: 15px;
  background-color: #e6e6e6;
  font-size: 14px;
  color: #333;
  transition: all 0.2s ease;
}

.input-field:focus {
  outline: none;
  background-color: #f0f0f0;
  box-shadow: 0 0 0 2px #b9d1e6;
}

.submit-button {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 15px;
  background-color: #e6e6e6;
  color: #333;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.2s ease;
  text-transform: uppercase;
}

.submit-button:hover {
  background-color: #d0d0d0;
  transform: translateY(-1px);
}

.submit-button:active {
  transform: translateY(0);
}
</style>

<div class="form-container">
  <h2 class="form-title">FORM PENDAFTARAN MEMBER</h2>
  
  <div class="input-group">
    <label for="nama">Nama Lengkap</label>
    <input type="text" id="nama" class="input-field" placeholder="Masukkan nama lengkap">
  </div>

  <div class="input-group">
    <label for="no-hp">No Hp</label>
    <input type="tel" id="no-hp" class="input-field" placeholder="Masukkan nomor HP">
  </div>

  <button type="submit" class="submit-button">SIMPAN</button>
</div>
@endsection