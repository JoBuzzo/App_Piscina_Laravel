<div>
	<button id="dataButton" data-dropdown-toggle="dataInput"
		class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600"
		type="button">
			PDF Reservas Disponiveis
		<svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
			xmlns="http://www.w3.org/2000/svg">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
		</svg>
	</button>
	<!-- Dropdown menu -->
	<form action="{{ route('reservas.pdf') }}" method="POST" target="_blank">
		@csrf
		<div id="dataInput"
			class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
			data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
			style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
			<ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dataButton">
				<li>
					<div>
						<label for="mes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecione o mês</label>
						<input type="month" name="mes" id="mes" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
					</div>
				</li>
				<li>
					<div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
						<button type="submit" class="dark:text-gray-200 w-full text-left">Baixar</button>
					</div>
				</li>
			</ul>
		</div>
	</form>
	
</div>