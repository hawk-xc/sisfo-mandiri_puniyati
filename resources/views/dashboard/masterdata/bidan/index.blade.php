<x-app-layout>
    <div>
        <div class="text-sm breadcrumbs">
            <ul class="font-light">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="#">Masterdata</a></li>
                <li>Bidan</li>
            </ul>
        </div>
        <div class="flex flex-col mx-auto bg-white rounded-sm shadow-sm">
            <div class="flex flex-row items-center justify-between w-full p-3 align-middle bg-white">
                <h3 class="flex-1 text-xl">Masterdata Bidan</h3>
                <button class="btn btn-sm btn-primary"><i class="ri-add-line"></i> Tambah Baru</button>
            </div>
            <hr />
            <div class="p-3 bg-white">
            </div>
        </div>
    </div>
</x-app-layout>
