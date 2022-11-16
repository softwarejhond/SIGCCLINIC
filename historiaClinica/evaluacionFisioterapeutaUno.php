<div class="card-body">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 px-2 mt-1">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Signos vitales</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Tipo de tórax</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Patrón respiratorio</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Sensibilidad</a>
    </div>
  </div>
  <div class="col-lg-9 col-md-12 col-sm-12 px-2 mt-1">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"><?include "./historiaClinica/evaluacionFisioterapeuta/signosVitales.php";?></div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"><?include "./historiaClinica/evaluacionFisioterapeuta/tipoTorax.php";?></div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"><?include "./historiaClinica/evaluacionFisioterapeuta/patronRespiratorio.php";?></div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"><?include "./historiaClinica/evaluacionFisioterapeuta/sensibilidad.php";?></div>
    </div>
  </div>
</div>
</div>