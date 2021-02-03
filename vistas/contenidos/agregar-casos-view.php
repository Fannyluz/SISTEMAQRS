<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left" style="color:#10226a;">
                        <h3>UPT <small>Oficina de Educación Virtual</small></h3>
           
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title" style="color:#10226a;">
                                <h2>UPTvirtual <small>Agregar Casos</small></h2>
                                    
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/CasoAjax.php" method="post" data-form="save" novalidate>
                                        
                                        </p>
                                        <span class="section">Casos que atiende la Oficina de Educación Virtual</span>

                                    
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Descripción</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' 
                                                name="caso_nombre_reg" id="caso_nombre" 
                                                placeholder="Ingrese la descripción" 
                                                data-validate-length-range="5,15" type="text" /></div>
                                        </div>


                                        <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Estado <span class="required">*</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="select2_single form-control" tabindex="-1">
													<option></option>
													<option value="AK">Activo</option>
													<option value="HI">Inactivo</option>
												</select>
											</div>
                                        </div>
                                        

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="date" required='required'></div>
                                        </div>
                                      

                                        
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                <br>
                                                    <button type='submit' class="btn btn-primary">Guardar</button>
                                                    <button type='reset' class="btn btn-success">Limpiar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                
                            
                                
                                
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
	include "./vistas/inc/validator.php"
	?>