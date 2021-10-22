<nav class="flex items-center justify-between flex-wrap p-6 bg-gray-800 text-white">
    <div class="flex items-center flex-shrink-0 text-gray-500 mr-6">
      <span class="font-semibold text-xl tracking-tight">Mi menuQr</span>
    </div>
    <div class="ml-auto lg:hidden">
      <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white mr-auto">
        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
      </button>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center">
      <div class="text-sm lg:flex-grow ">
        @auth
            <a href="{{url('/user/dashboard')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                Mi cuenta
            </a>
            <form action="{{url('/logout')}}" method="POST">
                @csrf
                <button type="submit" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Salir
                </button>
            </form>
        @else
            <a href="{{url('/login')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Iniciar Sesión
            </a>
            <a href="{{url('/register')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Registrarme
            </a>
        @endauth
      </div>
    </div>
  </nav>