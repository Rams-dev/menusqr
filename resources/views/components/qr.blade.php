<div class="px-3">
    <h2 class="text-2xl text-center">Tu codigo Qr</h2>
    <!-- <a href="{{url('/pdf/download')}}" class="bg-green-600 px-4 py-2 rounded-lg">Descargar</a> -->
    <div class="flex justify-center my-3 py-3">
        {{QrCode::size(350)->encoding('UTF-8')->generate(url('/'.$restaurant->name))}};
    </div>
</div>