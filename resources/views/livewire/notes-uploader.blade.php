
<div>
    @if($state)
    {{-- back buttton --}}
    <button title = "back" wire:click = "toggle" class = "w-8 h-8 m-2 grid place-content-center rounded-full hover:bg-gray-100 cursor-pointer transition-all"><i class="fa-solid fa-arrow-left"></i></button>
    
    {{-- form to upload notes --}}
    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 p-2 mb-4">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent = "create" class = "p-8" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input wire:model = "title" type="text" id="title" class="appearance-none bg-gray-100 rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="file" class="block text-gray-700 text-sm font-bold mb-2">File</label>
            <input wire:model = "file" type = "file" id="file" class = "appearance-none bg-gray-100 rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
            @error('file') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-gray-400 px-4 py-2 rounded text-white m-3 hover:bg-gray-500 transition all">Upload</button>
    </form>
    

    {{-- uploaded notes --}}
    @else
    <table class = "min-w-full text-sm font-light">
        <center>
            <h4 class = "table-caption">NOTES</h4>
        </center>
        <thead class = "border-b font-medium text-left">
            <th scope="col" class="px-6 py-4">Title</th>
            <th scope="col" class="px-6 py-4">date uploaded</th>
        </thead>
        <tbody>
            <tr class = "border-b transition duration-300 ease-in-out hover:bg-neutral-100 cursor-pointer">
                <td class="whitespace-nowrap px-6 py-4">Lorem ipsum dolor sit amet.</td>
                <td class="whitespace-nowrap px-6 py-4">25/9/23</td>
            </tr>
            <tr class = "border-b transition duration-300 ease-in-out hover:bg-neutral-100 cursor-pointer">
                <td class="whitespace-nowrap px-6 py-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</td>
                <td class="whitespace-nowrap px-6 py-4">28/9/23</td>
            </tr>
        </tbody>
    </table>
    <button wire:click="toggle" class = "bg-gray-400 px-4 py-2 rounded text-white m-3 hover:bg-gray-500 transition all">upload</button>
    @endif
</div>
