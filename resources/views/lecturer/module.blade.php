@extends('layout.lecturerLayout')

@section('content')


<section class = "grid grid-cols-1">
  {{-- first section --}}
    <section class="grid grid-cols-2 gap-5 p-5">
    
        <div class = "grid grid-rows-3 gap-5">
    
            {{-- MODULE INFO --}}
            <div class = "drop-shadow-2xl rounded-xl bg-white p-8">
                <h2 class = "font-bold text-3xl">{{$module->module_name}}</h2>
                <p class = "text-gray-600">{{$module->module_code}}</p>
                <p class = "text-gray-600">
                    {{$module->lecturer->title . " " . $module->lecturer->first_name . " " . $module->lecturer->last_name}}
                </p>
    
                <p class = "text-gray-600"><span>Phone: </span><a href="tel:{{$module->lecturer->phone}}">{{$module->lecturer->phone}}</a></p>
                <p class = "text-gray-600"><span>Email: </span><a href="mailto:{{$module->lecturer->email}}">{{$module->lecturer->email}}</a></p>
            </div>
    
            {{-- DESCRIPTIPN AND OBJECTIVE --}}
            <div x-data="{ open: false }" class="grid drop-shadow-2xl rounded-xl bg-white row-span-2 p-5">
              <div class="flex h-10 justify-between items-center">
                  <h3 class="font-bold">DESCRIPTION</h3>
                  <button @click="open = !open" class="h-8 w-8 rounded-full hover:bg-neutral-100 transition-all">
                      <i class="fa-solid fa-pencil"></i>
                  </button>
              </div>
              <p x-show="!open" >{{$module->description}}</p>
              <form x-show="open" x-cloak x-transition action="/lecturer/module/update/{{$module->module_code}}" method="POST">
                  @csrf
                  <div class = "h-80 w-[580px] overflow-scroll">
                    <textarea name="description" class="editor">{{$module->description}}</textarea>
                  </div>
                  <button type="submit" class="px-4 py-2 mt-1 bg-gray-400 text-white hover:bg-gray-500 rounded transition-all">Save</button>
              </form>
          </div>          
        </div>
    
        {{-- STUDENTS --}}
        <div class = "p-5 drop-shadow-2xl rounded-xl bg-white">
          <div class = "flex items-center justify-end">
            <input 
            type="search" 
            name=""
            id = "searchInput" 
            class = "w-40 py-2 px-4 m-2 rounded-full bg-gray-50 text-gray-500 outline-none focus:bg-gray-100 placeholder:pl-2 placeholder:text-center transition-all" 
            placeholder="search"
            >
          </div>
            <table class = "w-full text-sm font-light">
                <thead class = "bg-green-50">
                    <th class = "p-2">image</th>
                    <th class = "p-2">regno</th>
                    <th class = "p-2">first name</th>
                    <th class = "p-2">last name</th>
                    <th class = "p-2">phone</th>
                </thead>
                <tbody id = "studentRecord">
                    @foreach($students as $student)
                    <tr key = {{$student->regno}} class = "border-b border-gray-200 text-center">
                        @if($student->image)
                        <td class = "flex justify-center items-center p-2">
                            <img src={{ asset('/images/profile/' . $student->image) }} alt="" class = "h-10 w-10 rounded-full">
                        </td>
                        @else
                        <td class = "flex justify-center items-center p-2">
                            <img src={{ asset('/images/profile/profile-default.png') }} alt="" class = "h-10 w-10 rounded-full">
                        </td>
                        @endif
                        <td class = "whitespace-nowrap px-6 py-4">{{$student->regno}}</td>
                        <td class = "whitespace-nowrap px-6 py-4">{{$student->first_name}}</td>
                        <td class = "whitespace-nowrap px-6 py-4">{{$student->last_name}}</td>
                        <td class = "whitespace-nowrap px-6 py-4">{{$student->phone}}</td>
                    </tr>
                    <p>{{$students->links()}}</p>
                    @endforeach
                </tbody>
           </table>
        </div>
    
    </section>
    
    {{-- second section --}}
    <section class = "grid grid-cols-2 gap-5 p-5">

        {{-- UPLOADED ASSIGNMENTS --}}
        <div  
        x-data = "{open: false,edit: false}" 
        class = "w-auto p-5 drop-shadow-2xl rounded-xl bg-white"
        >
            <center>
                <h4 x-show = "!open && !edit" class = "table-caption">ASSIGNMENTS</h4>
                <h4 x-show = "edit && !open" class = "w-32">Edit Assignment</h4>
                <h4 x-show = "open" class = "w-32">Add Assignment</h4>
            </center>

            {{-- Add Assignment back button --}}
            <button @click = "open = !open" x-show = "open"  class = "ml-8 flex justify-center items-center rounded-full w-10 h-10 hover:bg-gray-200 active:border-2 active:border-gray-100 transition-all">
              <i class="fa-solid fa-arrow-left"></i>
            </button>

            {{-- Edit Assignment back button --}}
            <button @click = "edit = !edit" x-show = "edit"  class = "ml-8 flex justify-center items-center rounded-full w-10 h-10 hover:bg-gray-200 active:border-2 active:border-gray-100 transition-all">
              <i class="fa-solid fa-arrow-left"></i>
            </button>

            {{-- Add Assignment button --}}
            <button  @click = "open = !open" :class = "(open || edit) && 'hidden'" class = "bg-gray-400 px-4 py-2 rounded text-white m-3 hover:bg-gray-500 transition all">add assignment</button>

            {{-- list of assignments --}}
            <table x-show = "!open && !edit" class = "min-w-full text-sm font-light">
                <thead class = "border-b font-medium text-left">
                    <th scope="col" class="px-6 py-4">Title</th>
                    {{-- <th scope="col" class="px-6 py-4">date assigned</th> --}}
                    <th scope="col" class="px-6 py-4">due date</th>
                    <th scope="col" class="px-6 py-4 text-center">action</th>
                </thead>
                <tbody>
                  @if(count($notes) > 0)
                    @foreach($assignments as $assignment)
                    <tr class = "border-b">
                        <td class="whitespace-nowrap px-6 py-4">{{$assignment->assignment_title}}</td>
                        {{-- <td class="whitespace-nowrap px-6 py-4">{{$assignment->created_at}}</td> --}}
                        <td class="whitespace-nowrap px-6 py-4">
                          @php
                              echo dueDateChecker($assignment->assignment_due_date);
                          @endphp
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 flex justify-between items-center">

                          {{-- edit button --}}
                          <button @click = "edit = !edit" class = "flex items-center justify-center w-8 h-8 rounded-full transition duration-300 ease-in-out hover:bg-neutral-200 cursor-pointer active:border-2 active:border-gray-100">
                            <i class="fa-solid fa-pencil hover:text-gray-700"></i>
                          </button>

                          {{-- delete button --}}
                          <button class = "flex items-center justify-center w-8 h-8 rounded-full transition duration-300 ease-in-out hover:bg-neutral-200 cursor-pointer active:border-2 active:border-gray-100">
                            <i class="fa-solid fa-trash hover:text-gray-700"></i>
                          </button>

                        </td>
                    </tr>
                    @endforeach
                  @endif
                </tbody>
            </table>

            {{-- form to upload assignment --}}
            <form 
            x-show = "open"
            action = "/lecturer/assignment/upload/{{$module->module_code}}" 
            method = "POST" 
            class = "p-8" 
            enctype="multipart/form-data"
            >
              @csrf
              <div>
                  <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                  <input name = "title" type="text" id="title" class="appearance-none bg-gray-100 rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100" required>
                  @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>

              <div>
                  <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                  <textarea name = "description" id="description" class="editor"></textarea>
                  @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>

              <div>
                  <label for="due_date" class="block text-gray-700 text-sm font-bold mb-2">Due Date</label>
                  <input name = "due_date" type = "date" id="due_date" class="appearance-none bg-gray-100 rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"
                  required>
                  @error('due_date') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>

              <div>
                  <label for="due_time" class="block text-gray-700 text-sm font-bold mb-2">Due Time</label>
                  <input name = "due_time" type = "time" id="due_time" class="appearance-none bg-gray-100 rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100" required>
                  @error('due_time') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>

              <div>
                  <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                  <textarea name = "content" id="editor" class="editor"></textarea>
                  @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>
      
              <div>
                  <label class="block text-gray-700 text-sm font-bold mb-2">File</label>
                  <input name = "file" type = "file" id="file" class = "appearance-none bg-gray-100 cursor-pointer rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
                  @error('file') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>

              <button type="submit" class="bg-gray-400 px-4 py-2 rounded text-white m-3 hover:bg-gray-500 transition all">
                Upload
              </button>
            </form>

              {{-- form to update assignments --}}
            @foreach($assignments as $assignment)
            <form 
            x-show = "edit && !open"
            action = "/lecturer/assignment/upload/{{$module->module_code}}" 
            method = "POST" 
            class = "p-8" 
            enctype="multipart/form-data"
            >
              @csrf
              
              <div>
                  <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                  <input 
                  name = "title" 
                  type="text" 
                  id="title" 
                  value = "{{$assignment->assignment_title}}"
                  class="appearance-none bg-gray-100 rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100"
                  >
                  @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>

              <div>
                  <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                  <textarea name = "description" id="description" class="editor"></textarea>
                  @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>

              <div>
                  <label for="due_date" class="block text-gray-700 text-sm font-bold mb-2">Due Date</label>
                  <input name = "due_date" type = "date" id="due_date" class="appearance-none bg-gray-100 rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
                  @error('due_date') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>

              <div>
                  <label for="due_time" class="block text-gray-700 text-sm font-bold mb-2">Due Time</label>
                  <input name = "due_time" type = "time" id="due_time" class="appearance-none bg-gray-100 rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
                  @error('due_time') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>

              <div>
                  <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                  <textarea name = "content" id="editor" class="editor"></textarea>
                  @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>
      
              <div>
                  <label class="block text-gray-700 text-sm font-bold mb-2">File</label>
                  <input name = "file" type = "file" id="file" class = "appearance-none bg-gray-100 cursor-pointer rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
                  @error('file') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>

              <button type="submit" class="bg-gray-400 px-4 py-2 rounded text-white m-3 hover:bg-gray-500 transition all">
                Upload
              </button>
            </form>
            @endforeach
        </div>

        


    
        {{-- UPLOADED NOTES --}}
        <div x-data = "{openNoteForm: false}" class = "gap-5 p-5 drop-shadow-2xl rounded-xl bg-white">
          <table :class = "openNoteForm ? 'hidden' : '' " class = "min-w-full text-sm font-light">
            <center>
                <h4 class = "table-caption">NOTES</h4>
            </center>
            <thead class = "border-b font-medium text-left">
                <th scope="col" class="px-6 py-4">Title</th>
                <th scope="col" class="px-6 py-4">date uploaded</th>
                <th scope="col" class="px-6 py-4 text-center">action</th>
            </thead>
            <tbody>
              @foreach($notes as $note)
                <tr class = "border-b transition duration-300 ease-in-out hover:bg-neutral-100 cursor-pointer">
                    <td class="whitespace-nowrap px-6 py-4">{{$note->title}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$note->created_at}}</td>
                    <td class="whitespace-nowrap px-6 py-4 flex justify-evenly items-center">
                      <a href="" class = "flex items-center justify-center w-8 h-8 rounded-full transition duration-300 ease-in-out hover:bg-neutral-200 cursor-pointer">
                        <i class="fa-solid fa-pencil hover:text-gray-700"></i>
                      </a>
                      <a href="" class = "flex items-center justify-center w-8 h-8 rounded-full transition duration-300 ease-in-out hover:bg-neutral-200 cursor-pointer">
                        <i class="fa-solid fa-trash hover:text-gray-700"></i>
                      </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <button :class = "openNoteForm && 'hidden' " @click = "openNoteForm = !openNoteForm" class = "bg-gray-400 px-4 py-2 rounded text-white m-3 hover:bg-gray-500 transition all">add notes</button>
            <button @click = "openNoteForm = !openNoteForm" x-show = "openNoteForm"  class = "flex justify-center items-center rounded-full w-10 h-10 hover:bg-gray-200 active:border-2 active:border-gray-100 transition-all"><i class="fa-solid fa-arrow-left"></i></button>
          </table>
          
          {{-- form to upload notes --}}
          <form 
          x-show = "openNoteForm" 
          x-transition
          action = "/lecturer/notes/upload/{{$module->module_code}}" 
          method = "POST" 
          :class = "openNoteForm ? 'p-5' : 'hidden' " 
          enctype="multipart/form-data"
           >
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input name = "title" type="text" id="title" class="appearance-none bg-gray-100 rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
    
            <div class="mb-4">
                <label for="file" class="block text-gray-700 text-sm font-bold mb-2">File</label>
                <input name = "file" type = "file" id="file" class = "appearance-none bg-gray-100 cursor-pointer rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
                @error('file') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-gray-400 px-4 py-2 rounded text-white m-3 hover:bg-gray-500 transition all">Upload</button>
        
          </form>
        </div>
    </section>
</section>







<script>
  document.addEventListener('DOMContentLoaded', function() {
    const editors = document.querySelectorAll('.editor');

    editors.forEach(function(editorElement) {
        ClassicEditor
            .create(editorElement)
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    });
});



      const searchInput = document.getElementById("searchInput");

      searchInput.addEventListener('input', function() {
      const searchQuery = searchInput.value.trim().toLowerCase();

      // Loop through the table rows and hide/show based on the search query
      const tableRows = document.getElementById('studentRecord').querySelectorAll("tr");
      
      tableRows.forEach(function(row) {
          const regno = row.querySelector("td:nth-child(2)").textContent;
          const firstName = row.querySelector("td:nth-child(3)").textContent.toLowerCase();
          const lastName = row.querySelector("td:nth-child(4)").textContent.toLowerCase();

          if (firstName.includes(searchQuery) || lastName.includes(searchQuery) || regno.includes(searchQuery)) {
              row.style.display = "table-row";
          } else {
              row.style.display = "none";
          }
      });
  });







    const attendance = document.getElementById('attendanceChart');
    const performance = document.getElementById('performanceChart');


      
      new Chart(attendance, {
        type: 'bar',
        data: {
          labels: ['week 1', 'week 2', 'week 3', 'week 4'],
          datasets: [{
            label: 'Average Attendance',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1,
            backgroundColor: [
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 159, 64, 0.5)',
            'rgba(255, 205, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            ],
          }],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            }
          }
        }
      });

      new Chart(performance, {
        type: 'line',
        data: {
          labels: ['week 1', 'week 2', 'week 3', 'week 4'],
          datasets: [{
            label: 'Average Performance',
            data: [69, 75, 93, 65, 72, 53],
            borderWidth: 2,
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            tension: 0.1
          }],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            }
          }
        }
      });
</script>


@endsection