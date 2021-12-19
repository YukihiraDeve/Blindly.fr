
<link rel="stylesheet" href="/cssPages/styleHeader.css">


<header>

    <div class="">
      <nav class="navbar navbar-expand-lg bg-dark justify-content-md-between">

        <ul class="navbar stock mt-1 ">

          <li class="nav-item-active">

            <img class="togglemenu" data-toggle="collapse" data-target="#navbarToggleExternalContent"
              aria-controls="navbarToggleExternalContent" aria-label="Toggle navigation"
              src="/Images/toggle-menu-icon-png-8-Transparent-Images.png">

          </li>
          <li class="nav-item-active">
            <a class="nav-link navbar-brand " href="/Center/index.php">
              <h2 class="slogan nav-item blindly"> BlindLy </h2>
            </a>

          </li>
        </ul>

        <ul class="nav justify-content-end">
          <li class="nav-item justify-content-end d-flex">
            <img id="icon" type="button" class="son" src="/Images/logo sound 1.png" onclick="playVid()" width="40px">
          </li>
        </ul>

      </nav>

      <div class="row pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
          <div class="bg-dark p-4">
            <h5 class="text-white h4"> Paramètres de la page </h5>
            <span class="text-muted">
              <label class="form-label" for="customRange2"> Réglez le son de la page</label>
              <div class="col-3">
                 <div class="range">

                <input type="range" class="form-range" min="0" max="20" id="Range" onclick="settingsSound()" />
                <div>
                </div>
            </span>



            <h5 class="text-danger h4 parametre"><a id="ahrefDisconnect" href="/disconnect.php" style="color:red;">Déconnexion</a></h5>
            <span class="text-muted"> Vous reviendez sur la page de connexion </span>
          </div>
        </div>

      </div>

    </div>

    <audio id="MySong" src="/songs/Land – MusicbyAden (No Copyright Music).mp4" type="audio/mp3" autoplay loop>


    </audio>
    <script>


      function settingsSound() {
        const settings = document.getElementById('Range').value
        const sound = document.getElementById('MySong');

        if (settings == 0) {
          sound.volume = 0
        }
        if (settings == 1) {
          sound.volume = 0.005
        }
        if (settings == 2) {
          sound.volume = 0.015
        }
        if (settings == 3) {
          sound.volume = 0.020
        }
        if (settings == 4) {
          sound.volume = 0.025
        }
        if (settings == 5) {
          sound.volume = 0.030
        }
        if (settings == 6) {
          sound.volume = 0.035
        }
        if (settings == 7) {
          sound.volume = 0.040
        }
        if (settings == 8) {
          sound.volume = 0.045
        }
        if (settings == 10) {
          sound.volume = 0.050
        }
        if (settings == 11) {
          sound.volume = 0.055
        }
        if (settings == 12) {
          sound.volume = 0.060
        }
        if (settings == 13) {
          sound.volume = 0.065
        }
        if (settings == 14) {
          sound.volume = 0.070
        }
        if (settings == 15) {
          sound.volume = 0.075
        }
        if (settings == 16) {
          sound.volume = 0.080
        }
        if (settings == 17) {
          sound.volume = 0.085
        }
        if (settings == 18) {
          sound.volume = 0.090
        }
        if (settings == 19) {
          sound.volume = 0.095
        }
        if (settings == 20) {
          sound.volume = 0.1
        }
      }
    </script>

  </header>
