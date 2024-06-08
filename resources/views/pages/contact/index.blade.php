<x-app-layout>
    <div class="container mx-auto flex flex-wrap py-6">
        <header class="w-full container mx-auto">
            <div class="flex flex-col items-center py-12">
                <h1 class="font-bold text-5xl text-gray-800 uppercase ">
                    Kontak
                </h1>
            </div>
        </header>
        <section class="w-full bg-white flex flex-col items-center px-3">

            <div class="flex flex-row w-full">
                <div class=" flex flex-col text-gray-500 justify-start p-6 w-full">
                    <table>
                        <tr>
                            <td class="font-normal pb-2"><span>Alamat</span></td>
                            <td>:</td>
                            <td>{{ $location }}</td>
                        </tr>
                        <tr>
                            <td class="font-normal pb-2"><span>Telp</span></td>
                            <td>:</td>
                            <td><a href="tel:{{ $phone }}">{{ $phone }}</a></td>
                        </tr>
                        <tr>
                            <td class="font-normal pb-2"><span>E-mail</span></td>
                            <td>:</td>
                            <td><a href="mailto:{{ $email }}">{{ $email }}</a></td>
                        </tr>
                        <tr>
                            <td class="font-normal pb-2"><span>NPSN</span></td>
                            <td>:</td>
                            <td>{{ $npsn }}</td>
                        </tr>
                    </table>
                    <div class="h-96 mt-8">
                        <div class="h-full">
                            {!! $maps !!}
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-app-layout>
