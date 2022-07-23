  <!-- Popup Alert -->
  <?php
  if (isset($_SESSION['status'])) {
  ?>

    <div class="alert alert-success" role="alert" id="popup-alert" style="display: block;">

      <div class="alert-items" style="display: flex;justify-content: space-between; align-items:center;">
        <div class="popup-message">
          <?php echo $_SESSION['status']; ?>
        </div>

        <div class="close-button">
          <button class="close-button" onclick="myFunction()" style="margin: o px;">x</button>
        </div>

      </div>


    </div>


  <?php
    unset($_SESSION['status']);
  }
  ?>
  <!-- Popup Alert -->