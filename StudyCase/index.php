<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bahan Bakar</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

   <div class="container d-flex justify-content-center align-items-center mt-5" style="height: 95vh;">
      <div class="form-container p-5 bg-light shadow justify-content-center" style="width: 90%;">
         <div class="text-left d-flex align-items-center">
            <h1 class="text-center m-3" style="width: 50%;">Pembelian Bahan Bakar</h1>
               <form action="" method="post" class="form-control shadow rounded p-4 " style="width: 50%">
                  <select name="jenis" id="jenis" class="form-select" required>
                     <option value="" disabled selected>Pilih Jenis Bahan Bakar ⬇️</option>
                     <option value="shellSuper">Shell Super</option>
                     <option value="shellVpower">Shell V-Power</option>
                     <option value="shellVpowerDiesel">Shell V-Power Diesel</option>
                     <option value="shellVpowerNitro">Shell V-Power Nitro </option>
                  </select>
                  <input type="number" name="jumlah_liter" placeholder="Masukan Jumlah Liter" class="form-control mt-3">
                  <div class="d-grid gap-2">
                     <button type="submit" id="btn" name="btn" class="btn btn-primary mt-3">Cek</button>
                  </div>
               </form>
         </div>
            <?php include 'proses.php'; ?>
            <?php if(isset($_POST['btn'])) : ?>
               <div class="text-left  mt-5 bg-success shadow p-3 mb-5 rounded text-light">
                  <?php 
                  
                     $result = new Proses();
                     $result->setHarga(15420, 16130, 18310,16510);
                     $result->jumlah = $_POST['jumlah_liter'];
                     $result->jenis = $_POST['jenis'];

                     $result->getHarga();
                     $result->cetak();
                     
                  ?>
               </div>
            <?php endif ?>
      </div>
   </div>

</body>
</html>