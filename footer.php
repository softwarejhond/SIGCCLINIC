<!-- Footer -->
<footer class="text-center text-lg-start text-light footer">
    <!-- Copyright -->
    <div class="text-center p-3" >
        SISTEMA INTEGRAL DE GESTIÓN CLÍNICA <br>
        Todos los derechos reservados para:<br> 
        <?php
                              
                              $queryCompany = mysqli_query($con,"SELECT nombre,nit FROM company");
                              while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                               echo '<label  class="card-text">'.$empresaLog['nombre'].'</label>';
                               echo '<br>';
                               echo '<label  class="card-text">NIT: '.$empresaLog['nit'].'</label>';
                               }
                               ?>
        <br>
        SIGC &copy; Copyright <?php echo date("Y");?>
        <a class="text-light" href="https://agenciaeaglesoftware.com/">Agencia de Desarrollo Eagle Software</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
</footer>
</nav>
<style>
    .footer {
    color: #fff;
    background-image:url(images/footer.png);
  
}
</style>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/427e984aea.js" crossorigin="anonymous"></script>