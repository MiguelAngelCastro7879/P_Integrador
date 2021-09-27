
        <div class="modal fade" id="editarcuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
         <?php

         if(isset($_SESSION["trabajador"]))
         { 
          $busqueda="SELECT * from cuentas inner join trabajadores on trabajadores.cuenta=cuentas.cve where cuentas.cve=".$_SESSION["cve"] ;
          $datos=$db->seleccionar($busqueda);
          foreach($datos as $value)
          {
           ?>
                      <h5 class="modal-title" id="exampleModalLabel">Editar datos de Empleado</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="php/edicion_de_cuentas.php" method="post">
                      <div class="modal-body">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="nombre">Nombre</label>
                                  <input type="text" class="form-control" name="nombre" placeholder="Escriba su nombre completo" required <?php echo "value='$value->nombre'"?> >
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="Correo">Correo</label>
                                  <input type="email" class="form-control" name="correo" placeholder="Escriba su correo" required <?php echo "value='$value->correo'"?> >
                                </div>
                              </div>
                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <label for="celular">Celular</label>
                                    <input type="text" class="form-control" name="celular" placeholder="Escriba su numero de celular"required <?php echo "value='$value->telefono'"?>>
                                  </div>
                              </div>
                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <label for="cedula"><br>Cedula (este campo es opcional)</label>
                                    <input type="text" class="form-control" name="cedula" placeholder="Escriba su cedula" <?php echo "value='$value->cedula'"?> >
                                  </div>
                                </div>                  
                      
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
                        <button type="success" name="cc" class="btn btn-primary mr-auto" >Guardar datos</button>
                  </form>
                  
                        <form action="php/borrado_de_cuentas.php" method="post">
                           <button type="success" class="btn btn-danger " >Borrar cuenta</button>
                        </form>
                     </div>
         <?php }}
         else if (isset($_SESSION["cliente"]))
         {
           $busqueda="SELECT * from cuentas inner join clientes on clientes.cuenta=cuentas.cve where cuentas.cve=".$_SESSION["cve"] ;
           $datos=$db->seleccionar($busqueda);
           foreach($datos as $value)
           {
           ?>
           
           <h5 class="modal-title" id="exampleModalLabel">Editar datos de Cliente</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    
                    </div>
                <form action="php/edicion_de_cuentas.php" method="post">
                      <div class="modal-body">              
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="nombre">Nombre</label>
                                  <input type="text" class="form-control" name="nombre" placeholder="Escriba su nombre completo" <?php echo "value='$value->nombre'"?> > 
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="Correo">Correo</label>
                                  <input type="email" class="form-control" name="correo" placeholder="Escriba su correo" <?php echo "value='$value->correo'"?> >
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="celular">Celular</label>
                                  <input type="text" class="form-control" name="celular" placeholder="Escriba su numero de celular" <?php echo "value='$value->telefono'"?>>
                                </div>
                              </div>
                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <label for="direccion">Direccion</label>
                                    <input type="text" class="form-control" name="direccion" placeholder="Escriba su direccion"<?php echo "value='$value->direccion'"?>>
                                  </div>
                                </div>     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
                        <button type="success" name="cc" class="btn btn-primary mr-auto" >Guardar datos</button>
                  </form>
                  
                  <form action="php/borrado_de_cuentas.php" method="post">
                        <button type="success" class="btn btn-danger " >Borrar cuenta</button>
                </form>
                      </div>
         <?php }} ?>
                  </div>
                </div>
   </div>