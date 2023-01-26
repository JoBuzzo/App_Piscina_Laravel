<div id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start"
    class="relative cursor-pointer inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
    <span class="font-medium text-gray-600 dark:text-gray-300">{{ $avatar }}</span>
</div>


<div id="userDropdown" class="z-10 hidden bg-white rounded-lg shadow w-72 dark:bg-gray-700">
    <div class="flex justify-between items-center px-2 font-medium text-gray-900 dark:text-white border-b dark:border-gray-500 border-gray-100">
        <div>Editar Perfil</div>
        <a href="{{ route('logout') }}" class="hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg p-2.5">
            <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg>
        </a>
    </div>
    <x-form action="{{ route('users.update', auth()->user()->id) }}" method="PUT">

        <div class="mb-1">
            <x-input.text name="name" label="Nome" placeholder="Nome do usuário..."
                value="{{ auth()->user()->name }}" />
        </div>

        <div class="mb-1">
            <x-input.text name="login" label="Login" placeholder="Login do usuário..."
                value="{{ auth()->user()->login }}" />
        </div>

        <div class="mb-1">
            <x-input.password name="password" label="Senha" placeholder="••••••••" />
        </div>

       
            <x-button.submit>Salvar</x-button.submit>

    </x-form>
        
</div>
