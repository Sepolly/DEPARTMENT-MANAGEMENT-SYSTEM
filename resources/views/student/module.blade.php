@extends('layout.studentLayout')

@section('content')


<section class = "grid grid-cols-1 overflow-clip">
    <section class="grid grid-cols-2 gap-5 p-5 min-h-screen min-w-full">
    
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
    
        {{-- ATTENDANCE --}}
        <div class = "grid grid-rows-2 p-5 drop-shadow-2xl rounded-xl bg-white">

            <table class = "w-full text-sm font-light">
                <thead class = "bg-green-50">
                    <th class = "p-2">Day</th>
                    <th class = "p-2">Date</th>
                    <th class = "p-2">Attendance</th>
                    <th class = "p-2">Comments</th>
                </thead>
                <tbody>
                    <tr class = "border-b border-gray-200 text-center">
                        <td class = "whitespace-nowrap">Mon</td>
                        <td class = "whitespace-nowrap">12/10/23</td>

                        {{-- attendance tick --}}
                        <td class = "whitespace-nowrap text-green-500">
                            <i class="fa-solid fa-check"></i>
                        </td>
                        <td class = "whitespace-nowrap"></td>
                    </tr>
                    <tr class = "border-b border-gray-200 text-center">
                        <td class = "whitespace-nowrap">Wed</td>
                        <td>12/10/23</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class = "border-b border-gray-200 text-center">
                        <td class = "whitespace-nowrap">Friday</td>
                        <td class = "whitespace-nowrap">12/10/23</td>

                        {{-- attendance tick --}}
                        <td class = "whitespace-nowrap text-green-500">
                            <i class="fa-solid fa-check"></i>
                        </td>
                        <td class = "whitespace-nowrap"></td>
                    </tr>
                </tbody>
           </table>

           {{-- ATTENDANCE CHART --}}
            <div>
                <canvas id="attendanceChart"></canvas>
            </div>
        </div>
    
    </section>
    
    
    <section class = "grid grid-cols-2 gap-5 p-5 h-[100%] overscroll-contain">
        {{-- PERFORMANCE CHART AND NOTES --}}
        <div class = "grid grid-rows-2 gap-5">
            <div class = "p-5 drop-shadow-2xl rounded-xl bg-white">
                <canvas id="performanceChart"></canvas>
            </div>
            <div class = "p-5 drop-shadow-2xl rounded-xl bg-white ">
                <center>
                    <h4 class = "text-green-500 font-bold text-xl">NOTES</h4>
                </center>
                @if(count($notes) > 0)
                <div class = "flex justify-between items-center m-2">
                    <p class = "text-sm text-gray-400">click on a note to download</p>
                    <input 
                    type="search" 
                    id = "searchInput"
                    class = "w-40 py-2 px-4 rounded-full bg-gray-50 text-gray-500 outline-none focus:bg-gray-100 placeholder:pl-2 placeholder:text-center transition-all" 
                    placeholder="search"
                    >
                </div>
                <div class = "overflow-y-scroll">
                    @foreach($notes as $note)
                    <div class = "note-entry" id = "noteLink">
                        <a id = "noteLink"  href="{{ asset('files/notes/' . $note->file) }}" class="block border-b w-full text-left transition duration-300 ease-in-out hover:bg-neutral-100 whitespace-nowrap px-6 py-2 cursor-pointer" download>
                            <i class="fa-solid fa-paperclip text-sm"></i>
                            <span>
                                {{ $note->title }}
                            </span>
                            <span class = "float-right text-sm font-light text-gray-500">
                                {{ $note->created_at}}
                            </span>
                        </a>
                    </div>
                    @endforeach
                </div>

                    @else
                        <div class="h-full w-full flex justify-center items-center font-light text-gray-400 text-sm">
                            No notes uploaded
                        </div>
                @endif
            </div>
        </div>
    
        {{-- TEST AND ASSIGNMENT --}}
        <div class = "grid grid-rows-2 gap-5">
            <div class = "p-5 drop-shadow-2xl rounded-xl bg-white">
                <table class = "text-sm font-light m-auto">
                    <center>
                        <h4 class = "text-green-500 font-bold text-xl">TESTS</h4>
                    </center>
                    <thead class = "border-b font-medium text-left">
                        <th scope="col" class="px-6 py-4">Topic</th>
                        <th scope="col" class="px-6 py-4">date</th>
                        <th scope="col" class="px-6 py-4">time</th>
                        <th scope="col" class="px-6 py-4">duration</th>
                        <th scope="col" class="px-6 py-4">status</th>
                    </thead>
                    <tbody>
                        <tr class = "border-b transition duration-300 ease-in-out hover:bg-neutral-100 cursor-pointer">
                            <td class="whitespace-nowrap px-6 py-4">Topic 1</td>
                            <td class="whitespace-nowrap px-6 py-4">25/9/23</td>
                            <td class="whitespace-nowrap px-6 py-4">11:00 AM</td>
                            <td class="whitespace-nowrap px-6 py-4">1 hr</td>
                            <td class="whitespace-nowrap px-6 py-4 text-green-400">committed</td>
                        </tr>
                        <tr class = "border-b transition duration-300 ease-in-out hover:bg-neutral-100 cursor-pointer">
                            <td class="whitespace-nowrap px-6 py-4">Topic 2</td>
                            <td class="whitespace-nowrap px-6 py-4">28/9/23</td>
                            <td class="whitespace-nowrap px-6 py-4">1:00 PM</td>
                            <td class="whitespace-nowrap px-6 py-4">2 hr</td>
                            <td class="whitespace-nowrap px-6 py-4 text-red-400">uncomitted</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- ASSIGNMENTS --}}
            <div class = "drop-shadow-2xl rounded-xl p-5 bg-white">
                <table class = "min-w-full text-sm font-light ">
                    <center>
                        <h4 class = "text-green-500 font-bold text-xl">ASSIGNMENTS</h4>
                    </center>
                    <div class = "flex items-center justify-end">
                        <input 
                    type="search" 
                    id = "assignmentSearch"
                    name="" 
                    class = "w-40 py-2 px-4 rounded-full bg-gray-50 text-gray-500 outline-none focus:bg-gray-100 placeholder:pl-2 placeholder:text-center transition-all" 
                    placeholder="search"
                    >
                    </div>
                    <thead class = "border-b font-medium text-left">
                        <th scope="col" class="px-6 py-4">Title</th>
                        <th scope="col" class="px-6 py-4">due date</th>
                        <th scope="col" class="px-6 py-4">due time</th>
                        <th scope="col" class="px-6 py-4">status</th>
                    </thead>
                    <tbody id = "assignmentScope" class = "overflow-y-scroll">
                        @if(count($assignments) > 0)
                        @foreach($assignments as $assignment)
                            <tr class = "border-b transition duration-300 ease-in-out hover:bg-neutral-100 cursor-pointer overflow-y-scroll">
                                <td class="whitespace-nowrap px-6 py-4">{{$assignment->assignment_title}}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @php
                                        echo dueDateChecker($assignment->assignment_due_date);
                                    @endphp
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-blue-400">{{$assignment->assignment_due_time}}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-green-400">submitted</td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <p>{{$assignments->links()}}</p>
            </div>
        </div>
    </section>
</section>

<script>

    // java script code to filter notes based on search query
    const searchInput = document.getElementById("searchInput");

    searchInput.addEventListener('input', function() {
        const searchQuery = searchInput.value.trim().toLowerCase();
        // const cleanSearch = searchQuery.replace(/\s+/g, '');

        // Loop through the note entries and hide/show based on the search query
        const noteEntries = document.querySelectorAll('.note-entry');

        noteEntries.forEach(function(entry) {
            const noteTitle = entry.querySelector("span").textContent.toLowerCase();

            if (noteTitle.includes(searchQuery) || noteTitle == searchQuery) {
                entry.style.display = "block";
            } else {
                entry.style.display = "none";
            }
        });
    
    });
    // end of the filter notes code


    // Javascript code to filter assignments based on search query
    const assignmentSearch = document.getElementById("assignmentSearch");
    
    assignmentSearch.addEventListener('input',()=>{
        const searchInput  = assignmentSearch.value.trim().toLowerCase();

        const tableRows = document.getElementById("assignmentScope").querySelectorAll("tr");

        tableRows.forEach((row)=>{
            const title = row.querySelector("td:first-child").textContent.toLowerCase();
            const status = row.querySelector("td:last-child").textContent.toLowerCase();

            if(title.includes(searchInput) || status.includes(searchInput)){
                row.style.display = "table-row";
            }
            else{
                row.style.display = "none";
            }
            
        });
    });
    // end of the filter assignments code



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