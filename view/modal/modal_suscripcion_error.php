<div class='modal' style='z-index:20000;top:20%' tabindex='-1' role='dialog' id='ventana-modal'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content border-0' style=' border-radius: 12px;'>
      <div class='modal-header justify-content-center text-white' style='background-color:red;'>
        <h5 class='modal-title text-center'>This email is already subscribed
          <?= $_POST['suscripcion'] ?></h5>
      </div>
      <div class='modal-body ' style='background-color:#e0e0e0;'>
        <p class='text-center ' style='color:black;'>Sorry this email is already subscribed</p>
      </div>
      <div class='modal-footer border-0 p-2' data-dismiss="modal" style='background-color:#e0e0e0;'>
        <button type='button' class='btn '><a class='text-white'>Back</a></button>
      </div>
    </div>
  </div>
</div>