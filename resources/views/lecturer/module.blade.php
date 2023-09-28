@extends('layout.lecturerLayout')

@section('content')


<section class = "grid grid-cols-1 gap-5">
    <section class="grid grid-cols-2 gap-5 p-5 h-screen">
    
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
            <div class = " grid drop-shadow-2xl rounded-xl bg-white row-span-2 p-8">
                <h3 class = "font-bold">DESCRIPTION</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam assumenda, quidem, aliquid expedita cum culpa fugiat laborum modi voluptatibus pariatur, est eum? Repellat totam dolor eum pariatur culpa tempore eius, doloribus consequuntur doloremque? Suscipit quas eum accusantium. Itaque quis nisi error libero odit fugiat repellendus voluptatum excepturi aperiam, provident rem?</p>
                <hr>
                <h3 class = "font-bold">OBJECTIVES</h3>
                <ul class = "list-disc list-inside">
                    <li>objective 1</li>
                    <li>objective 2</li>
                    <li>objective 3</li>
                </ul>
            </div>

        </div>
    
        {{-- STUDENTS --}}
        <div class = "p-5 drop-shadow-2xl rounded-xl bg-white">

            <table class = "w-full text-sm font-light">
                <thead class = "bg-green-50">
                    <th class = "p-2">image</th>
                    <th class = "p-2">regno</th>
                    <th class = "p-2">first name</th>
                    <th class = "p-2">last name</th>
                    <th class = "p-2">phone</th>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr class = "border-b border-gray-200 text-center">
                        @if($student->image)
                        <td>
                            <img src={{ asset('/images/profile/' . $student->image) }} alt="" class = "h-10 w-10 rounded-full">
                        </td>
                        @else
                        <td>
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
    
    
    <section class = "grid grid-cols-2 gap-5 p-5 h-96">

        {{-- UPLOADED ASSIGNMENTS --}}
        <div class = "p-5 drop-shadow-2xl rounded-xl bg-white">
            <table class = "min-w-full text-sm font-light">
                <center>
                    <h4 class = "table-caption">ASSIGNMENTS</h4>
                </center>
                <thead class = "border-b font-medium text-left">
                    <th scope="col" class="px-6 py-4">Title</th>
                    <th scope="col" class="px-6 py-4">date assigned</th>
                    <th scope="col" class="px-6 py-4">due date</th>
                </thead>
                <tbody>
                  @if(count($notes) > 0)
                    @foreach($assignments as $assignment)
                    <tr class = "border-b transition duration-300 ease-in-out hover:bg-neutral-100 cursor-pointer">
                        <td class="whitespace-nowrap px-6 py-4">{{$assignment->assignment_title}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{$assignment->created_at}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{$assignment->assignment_due_date}}</td>
                    </tr>
                    @endforeach
                  @endif
                </tbody>
                <button class = "bg-gray-400 px-4 py-2 rounded text-white m-3 hover:bg-gray-500 transition all">add assignment</button>
            </table>

            {{-- form to upload assignment --}}
            <form 
            action = "/lecturer/assignment/upload/{{$module->module_code}}" 
            method = "POST" 
            class = "p-8" 
            enctype="multipart/form-data"
            >
              @csrf
              @if(Session::has('message'))
                <div>
                  {{Session::get('message')}}
                </div>
              @endif
              <div class="mb-4">
                  <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                  <input name = "title" type="text" id="title" class="appearance-none bg-gray-100 rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
                  @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>
              <div class="mb-4">
                  <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                  <input name = "description" type="text" id="description" class="appearance-none bg-gray-100 rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
                  @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>
              <div class="mb-4">
                  <label for="due_date" class="block text-gray-700 text-sm font-bold mb-2">Due Date</label>
                  <input name = "due_date" type="date" id="due_date" class="appearance-none bg-gray-100 rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
                  @error('due_date') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>
              <div class="mb-4">
                  <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                  <input name = "content" type="text" id="content" class="appearance-none bg-gray-100 rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
                  @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>
      
              <div class="mb-4">
                  <label for="file" class="block text-gray-700 text-sm font-bold mb-2">File</label>
                  <input name = "file" type = "file" id="file" class = "appearance-none bg-gray-100 cursor-pointer rounded w-full h-10 py-2 px-3 text-gray-700 leading-tight focus:outline-green-100">
                  @error('file') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>

              <button type="submit" class="bg-gray-400 px-4 py-2 rounded text-white m-3 hover:bg-gray-500 transition all">Upload</button>
            </form>
        </div>

        


    
        {{-- UPLOADED NOTES --}}
        <div x-data = "{open: false}" class = "gap-5 p-5 drop-shadow-2xl rounded-xl bg-white">
          <table class = "min-w-full text-sm font-light">
            <center>
                <h4 class = "table-caption">NOTES</h4>
            </center>
            <thead class = "border-b font-medium text-left">
                <th scope="col" class="px-6 py-4">Title</th>
                <th scope="col" class="px-6 py-4">date uploaded</th>
            </thead>
            <tbody>
              @foreach($notes as $note)
                <tr class = "border-b transition duration-300 ease-in-out hover:bg-neutral-100 cursor-pointer">
                    <td class="whitespace-nowrap px-6 py-4">{{$note->title}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$note->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
            <button @click = "open =! open" class = "bg-gray-400 px-4 py-2 rounded text-white m-3 hover:bg-gray-500 transition all">upload</button>
          </table>
          
          {{-- form to upload notes --}}
          <form 
          x-show = "open" 
          x-transition
          action = "/lecturer/notes/upload/{{$module->module_code}}" 
          method = "POST" 
          class = "p-8" 
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