@php
   use App\Models\Reserva;
   $primeiro = Reserva::all()->where('primeiro_dia', '!=', false)->count();
   $ultimo = Reserva::all()->where('ultimo_dia', '!=', false)->count();

   $quantia = $primeiro + $ultimo;
@endphp


<div class="sidebar">

    <aside class="w-64" aria-label="Sidebar">
        <div class="overflow-y-auto py-4 px-3">
           <ul class="space-y-5">
              <li>
                 <a href="{{route('index')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                    <span class="ml-3">Dashboard</span>
                 </a>
              </li>
              <li class="mobile">
                 <a href="{{route('reservas')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </a>
              </li>
              <li class="mobile">
                 <a href="{{route('reservas.adicionar')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                </a>
              </li>
            
              <li class="desktop">
                <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 " aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                      <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                      <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Reservas</span>
                      <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{route('reservas')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                           <span class="flex-1 ml-3 whitespace-nowrap"><i class="far fa-calendar-alt text-gray-500 p-2"></i> Lista de Reservas</span>
                           <span class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full">{{ $quantia }}</span>
                        </a>
                     </li>
                      <li>
                            <a href="{{route('reservas.adicionar')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                                <span class="flex-1 ml-3 whitespace-nowrap"><i class="fas fa-calendar-plus text-gray-500 p-2"></i> Adicionar Reserva</span>
                            </a>
                      </li>
                </ul>
             </li>
             <li>
                <a href="{{ route('admins') }}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                     <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                     <span class="flex-1 ml-3 whitespace-nowrap">Contas de Administrador</span>
                </a>
             </li>
             <li>
                <a href="{{ route('viewConfig') }}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                   <span class="flex-1 ml-3 whitespace-nowrap">Configurações</span>
                </a>
             </li>
             <li>
                <a href="{{ route('logout') }}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-900">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                   <span class="flex-1 ml-3 whitespace-nowrap">Log-out</span>
                </a>
             </li>
           </ul>
        </div>
     </aside>

</div>


