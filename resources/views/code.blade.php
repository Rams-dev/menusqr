<x-app-layout>
    <h3 class="text-center my-2 bg-white p-3 ">¡Hola {{auth()->user()->name}}, Dime tu codigo</h3>

    <div class="max-w-full mx-auto rounded bg-white overflow-hidden shadow-lg my-2">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2 text-center">Código</div>
          <form action="{{url('/code')}}" method="post">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                  Códido
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="code">
              </div>
                <div class="flex justify-center">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Verificar
                    </button>
                </div>
              <div class="py-6">
                  <p class="my-3">Si no cuentas con un código, comunicate con el gerente de ventas para obtener uno</p>
                  <a href="tel:9511779795" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >Llamar a ventas</a>
                  <a href="https://api.whatsapp.com/send?phone=5219511779795&amp;text=¡Hola!,%20me%20registe%20en%20https://ordenalo.online%20me%20gustaria%obtener%20un%20código" class="bg-green-500 text-white hover:bg-green-700 focus:outline-none py-2 px-4 rounded">Enviar un whatsapp</a>
              </div>
          </form>
          
        </div>
      </div>


</x-app-layout>