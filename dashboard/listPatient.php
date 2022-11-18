<div class="card text-center">
    <div class="card-header" style="background-image:url(images/footer.png); color:#fff">
        <i class="fas fa-user-injured"></i> LISTA DE PACIENTES <i class="fas fa-user-injured"></i>
    </div>
    <div class="card-body">
        <form action="" method="GET">
            <div class="input-group mb-3">
                <input type="number" name="search" required
                    value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control"
                    placeholder="Buscar paciente">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM patient WHERE numeroIdentificacion LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                            <tr>
                                <td><?= $items['id']; ?></td>
                                <td><?= $items['numeroIdentificacion']; ?></td>
                                <td><?= $items['nombre']; ?></td>
                                <td><?= $items['apellidos']; ?></td>
                                <td><a href="historiaClinica.php?nik='<?= $filtervalues?>'"
                                        title="Realizar historia clínica" class="btn btn-outline-success btn-sm"><span
                                            class="fa fa-laptop-medical" aria-hidden="true"></span></a></td>

                            </tr>
                            <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                            <tr>
                                <td colspan="4">No Record Found</td>
                            </tr>
                            <?php
                                        }
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        </body>
    </div>
    <div class="card-footer " style="background-image:url(images/footer.png); color:#fff">
        <i class="fas fa-clock"></i>
        <?php
                                        $DateAndTime = date('m-d-Y h:i:s a', time());
                                        echo "Actualizado $DateAndTime.";
                                    ?>
    </div>

</div>
<script>
$(document).ready(function() {
    $(".toastPatient").toast('show');
});
</script>