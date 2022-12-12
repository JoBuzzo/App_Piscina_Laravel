<div class="sidebar">

    <aside class="w-64" aria-label="Sidebar">
        <div class="overflow-y-auto py-4 px-3">
           <ul class="space-y-5">
              <li>
                 <a href="{{route('index')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                     <x-icons.dashboard />
                    <span class="ml-3">Dashboard</span>
                 </a>
              </li>
              {{-- Reservas --}}
              <li class="mobile">
                 <a href="{{route('reservas')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                     <x-icons.calendar-list />
                </a>
              </li>

              {{-- Adicionar Reservas --}}
              <li class="mobile">
                 <a href="{{route('reservas.adicionar')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                     <x-icons.plus />
                  </a>
              </li>

              {{-- Despesas --}}
              <li class="mobile">
                 <a href="{{route('despesas')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                     <x-icons.document-duplicate />
                </a>
              </li>

              {{-- Adiconar Despesas --}}
              <li class="mobile">
                 <a href="{{route('despesas.adicionar')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                     <x-icons.document-add />
                </a>
              </li>
            
              <li class="desktop">
                <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 " aria-controls="reservas" data-collapse-toggle="reservas">
                     <x-icons.calendar-list />
                     <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Reservas</span>
                     <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="reservas" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{route('reservas')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                           <span class="flex-1 ml-3 whitespace-nowrap"><i class="far fa-calendar-alt text-gray-500 p-2"></i> Lista de Reservas</span>
                           <x-count/>
                        </a>
                     </li>
                      <li>
                            <a href="{{route('reservas.adicionar')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                                <span class="flex-1 ml-3 whitespace-nowrap"><i class="fas fa-calendar-plus text-gray-500 p-2"></i> Adicionar Reserva</span>
                            </a>
                      </li>
                </ul>
             </li>
              <li class="desktop">
                <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 " aria-controls="despesas" data-collapse-toggle="despesas">
                     <x-icons.document-duplicate />
                     <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Despesas</span>
                     <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="despesas" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{route('despesas')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                           <span class="flex-1 ml-3 whitespace-nowrap"><i class="far fa-file-alt text-gray-500 p-2"></i> Lista de Despesas</span>
                        </a>
                     </li>
                      <li>
                            <a href="{{route('despesas.adicionar')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                                <span class="flex-1 ml-3 whitespace-nowrap"><i class="fas fa-file-medical text-gray-500 p-2"></i> Adicionar Despesa</span>
                            </a>
                      </li>
                </ul>
             </li>
             <li>
                <a href="{{ route('admins') }}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                     <x-icons.users />
                     <span class="flex-1 ml-3 whitespace-nowrap">Contas de Administrador</span>
                </a>
             </li>
             <li>
                <a href="{{ route('viewConfig') }}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                     <x-icons.gear />
                     <span class="flex-1 ml-3 whitespace-nowrap">Configurações</span>
                </a>
             </li>
             <li>
                <a href="{{ route('logout') }}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                     <x-icons.logout />
                     <span class="flex-1 ml-3 whitespace-nowrap">Log-out</span>
                </a>
             </li>
           </ul>
        </div>
     </aside>

</div>


