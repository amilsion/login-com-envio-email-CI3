

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><?=$title?></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
            <?php elseif($this->session->flashdata('error')):?>
                <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
            <?php endif;?>
            <div class="row">
                <div class="col-lg-12">      
                    <table class="table table-striped table-bordered table-hover" id="dataTables-user-list">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Função</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users  as $row): ?>
                            <tr>
                                <td><?php echo $row->name; ?></td> 
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo ucfirst($row->role) ?></td> 
                                
                                <td>
                                    <a class="btn btn-primary" id="user-edit"  onclick="edit_user_popup('<?=$row->email?>','<?=$row->user_id?>','<?=$row->name?>','<?=$row->role?>');" data-toggle="modal" data-target="#editUser"> Editar </a>
                                    <a class="btn btn-warning" id="user-riset" onclick="reset_confirmation('<?=$row->email?>','<?=$row->user_id?>')" data-toggle="modal" data-target="#resetConfirm"> Resetar </a>
                                    <a class="btn btn-danger" id="user-delete" onclick="deactivate_confirmation('<?=$row->email?>','<?=$row->user_id?>');" data-toggle="modal" data-target="#deactivateConfirm"> Excluir </a>
                                    
                                </td>

                            </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>

                    <div class="plus col-lg-12">
						<span class="add_user btn_plus" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></span>
                        <!--img class="add_user" src="<?=base_url()?>assets/images/add.png" data-toggle="modal" data-target="#addUser" /-->
                    </div>
					
					<!--div class="controlador" style="margin-top: 30px;">
						<div class="adicionar_interacao">
							<button class="add_user btn btn_plus" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus" aria-hidden="true"></i></button>
							<span>Adicionar Interação</span>
						</div>
					</div-->

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>



        <!-- Modal -->
        <div class="modal fade" id="deactivateConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-red">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Confirmar Exclusão</h4>
                    </div>
                    <div class="modal-body">
                        <label>Você vai excluir o usuário(a) <label id="user-email" style="color:blue;"></label>?</label><br/>
                        <label>Click <b style="color:blue;">Sim</b> para continuar.</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <a id="deactivateYesButton" class="btn btn-danger" >Sim</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal -->
        <div class="modal fade" id="resetConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-red">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Confirmar Resete se senha</h4>
                    </div>
                    <div class="modal-body">
                        <label>Você vai redefinir a senha do usuário <label id="reset-user-email" style="color:blue;"></label>.</label><br/>
                        <label>Senha temporária será enviada para este e-mail.</label><br/>
                        <label>Click <b>Sim</b> para continuar.</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <a id="resetYesButton" class="btn btn-warning" >Sim</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->




        <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Criar novo usuário</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nome</label> &nbsp;&nbsp;
                                    <label class="error" id="error_name"> campo é necessário.</label>
                                    <label class="error" id="error_name2"> o nome deve ser alfanumérico.</label>
                                    <input class="form-control" id="name" placeholder="Nome" name="name" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email</label> &nbsp;&nbsp;
                                    <label class="error" id="error_email"> campo é necessário.</label>
                                    <label class="error" id="error_email2"> e-mail já existe.</label>
                                    <label class="error" id="error_email3"> endereço de e-mail inválido.</label>
                                    <input class="form-control" id="email" placeholder="E-mail" name="email" type="email" autofocus>
                                </div> 
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Role</label>&nbsp;&nbsp;
                                    <label class="error" id="error_role"> campo é necessário.</label>
                                    <select name="role" id="role" class="form-control" >
                                        <option value="0" selected="selected"> Selecione a função </option>
                                        <option value="admin">Administrador</option>
                                        <option value="user">Cliente</option>
                                    </select> 
                                </div>
                            </div>
                      </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button id="newUserSubmit" type="button" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Atualizar detalhes de usuário</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden"  id="edit-user-id" value=""/>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nome</label> &nbsp;&nbsp;
                                    <label class="error" id="edit-error_name"> campo é necessário.</label>
                                    <label class="error" id="edit-error_name2"> o nome deve ser alfanumérico.</label>
                                    <input class="form-control" id="edit-name" placeholder="Nome" name="edit-name" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email</label> &nbsp;&nbsp;
                                    <label class="error" id="edit-error_email"> campo é necessário.</label>
                                    <label class="error" id="edit-error_email2"> e-mail já existe.</label>
                                    <label class="error" id="edit-error_email3"> endereço de e-mail inválido.</label>
                                    <input class="form-control" id="edit-email" placeholder="E-mail" name="edit-email" type="email" autofocus>
                                </div> 
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Role</label>&nbsp;&nbsp;
                                    <label class="error" id="edit-error_role"> campo é necessário.</label>
                                    <select name="role" id="edit-role" class="form-control" >
                                    </select> 
                                </div>
                            </div>
                      </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button id="editUserSubmit" type="button" class="btn btn-primary">Atualizar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
       
        <!-- /#page-wrapper -->
        <?php $this->load->view('frame/footer_view')?>
        <script src="<?=base_url()?>assets/js/view/user_list.js"></script>