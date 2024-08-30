<li class="nav-item dropdown ms-auto me-3">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false"
                            class="nav-link dropdown-toggle">
                            <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Admin"
                                class="rounded-circle d-inline-block" width="35">
                            <span class="ms-1 d-none d-sm-inline-block text-uppercase font-bold">
                                {{ $usuarioLogeado }}
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Configuración</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                              <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
