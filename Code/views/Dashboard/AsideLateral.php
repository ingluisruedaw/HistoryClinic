<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="?action=cambiar_clave"><i class="mdi-action-face-unlock"></i>Clave</a></li>
                        <li class="divider"></li>
                        <li><a href="?action=cerrar_sesion"><i class="mdi-hardware-keyboard-tab"></i>Logout</a></li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $_SESSION['username']
                    ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal">WebMaster</p>
                </div>
            </div>
        </li>
        <li class="divider"></li>
            <!--<li class="bold"><a href="?action=webmaster" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>-->
        </li>
            <li class="divider"></li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-perm-contact-cal"></i> Pacientes</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?action=cliente">Paciente</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=residencia">Residencia</a></li>
                                <li class="divider"></li>
                            </ul>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-receipt"></i> Historia Clinica</a>
                        <div class="collapsible-body">
                            <ul>                                        
                                <li><a href="?action=historia_clinica">Historia Clinica</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=motivo_index">Motivo Consulta</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=enfermedad_index">Enfermedad Actual</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=antecedentes_index">Antecedentes</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=revision_index">Revision Por Sistemas</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=examen_index">Examen Fisico</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=impresion_index">Impresión Diagnostica</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=tratamiento_index">Tratamiento</a></li>
                                <li class="divider"></li>
                            </ul>
                        </div>
                    </li>                  
                    <li class="divider"></li>
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-trending-up"></i> Evolución</a>
                        <div class="collapsible-body">
                            <ul>                                        
                                <li><a href="?action=evolucion_index">Evolucion</a></li>
                                <li class="divider"></li>                       
                            </ul>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-description"></i> Reportes</a>
                        <div class="collapsible-body">
                            <ul>                                        
                                <li><a href="?action=reporte_index">Historia Clinica</a></li>
                                <li class="divider"></li>                       
                            </ul>
                        </div>
                    </li>

                </ul>
            </li>
            <li class="li-hover"><div class="divider"></div></li>
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
    </aside>