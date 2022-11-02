@extends('layouts.app')

@section('content')
    <div class="p-3">

    </div>
    <div class="">

        <div class="select-all-dropdown justify-content-between align-items-center px-5">
           <div class="d-flex align-items-center">
               <div class="me-3">
                   <p>
                       <button class="btn btn-primary btn-sm py-0"  type="button" data-bs-toggle="collapse" data-bs-target="#mulitpleSelect" aria-expanded="false" aria-controls="mulitpleSelect">
                           <i class="bi bi-dash fs-4 fw-bold"></i>
                           <i class="bi bi-caret-down-fill"></i>
                       </button>
                   </p>
                   <div style="" class="position-fixed">
                       <div class="collapse collapse-vertical" id="mulitpleSelect">
                           <div class="card card-body" >
                               <ul class="list-group" style="list-style-type: none">
                                   <li onclick="SelectAll()"><a id="selectAll" class="list-group-item border-0" href="#" >All</a></li>
                                   <li onclick="SelectNone()"><a id="selectNone" class="list-group-item border-0" href="#" >None</a></li>
                               </ul>

                           </div>
                       </div>
                   </div>
               </div>
               <div class="">
                   <p>
                       <button class="btn text-primary btn-sm py-0"  type="button" data-bs-toggle="collapse" data-bs-target="#multipleDel" aria-expanded="false" aria-controls="multipleDel">
                           <i class="bi bi-three-dots-vertical fs-3"></i>
                       </button>
                   </p>
                   <div style="" class="position-fixed">
                       <div class="collapse collapse-vertical" id="multipleDel">
                           <div class="card card-body" >
                               <form class="d-flex align-items-center" id="multipleId"  method="post">
                                   @csrf
                               <ul class="list-group" style="list-style-type: none">
                                   <li >
                                       <div class="list-group  border-bottom border-1">


                                           <button class=" fw-bold text-black-50 mb-0 list-group-item d-flex border-0">
                                               <i class="bi bi-printer me-3 fs-5 "></i>
                                               <span>Print</span>
                                           </button>
                                           <button id="exportMultiple" class=" fw-bold text-black-50 mb-0 list-group-item d-flex border-0">
                                               <i class="bi bi-cloud-arrow-down me-3 fs-5 "></i>
                                               <span>Export</span>
                                           </button>
                                           <button class=" fw-bold text-black-50 mb-0 list-group-item d-flex border-0">
                                               <i class="bi bi-cloud-arrow-up me-3 fs-5 "></i>
                                               <span>Hide From Contact</span>
                                           </button>
                                       </div>
                                             <button class="btn me-2 text-black-50 " id="multiDel"><i class="bi bi-trash3"></i> <span class="mb-0 fw-bold text-black-50">Delete</span></button>

                                             <button class="btn me-2 text-black-50 " id="multiCopy"><i class="bi bi-code"></i><span class="mb-0 fw-bold text-black-50">copy</span></button>

                                   </li>

                               </ul>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
            <p class="selectItem text-primary"></p>
        </div>


        <table class="table table-borderless table-hover">
            <thead >

            <tr id="tableHead" class="border-bottom w-100 border-1">
                <td class="fw-bold text-black-50">Name</td>
                <td class="fw-bold text-black-50">Email</td>
                <td class="fw-bold text-black-50">Phone Number</td>

                <td class="fw-bold text-black-50">Job Title & company</td>
                <td>

                </td>


            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <span class="text-black-50 text-uppercase small fw-bold">
                        contacts({{\App\Models\Contact::count()}})
                    </span>
                </td>
            </tr>
            @foreach($contacts as $contact)
            <tr class="trows" onclick="handleShowRoute(`{{route('contact.show',$contact->id)}}`)">

                <td class="" >
                    <div class="d-flex align-items-center">
                        <div class="dot-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" class="NSy2Hd cdByRd RTiFqe undefined"><path fill="none" d="M0 0h24v24H0V0z"></path><path fill="rgba(0, 0, 0, 0.5)" d="M11 18c0 1.1-.9 2-2 2s-2-.9-2-2 .9-2 2-2 2 .9 2 2zm-2-8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6 4c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                        </div>
                        <input id="{{$contact->id}}"   onclick="checkCheckBox({{$contact->id}})" type="checkbox" class="delCheckbox me-2 " form="multipleId" value="{{$contact->id}}" name="multipleId[]">
                        @if($contact->photo)
                            <div id="contact{{$contact->id}}" class="contact-people border-1 border-primary rounded-pill text-center me-2 overflow-hidden text-white">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($contact->photo)}}" class="w-100" alt="">

                            </div>
                        @else
                            <div id="contact{{$contact->id}}" class="contact-people border-1  rounded-pill text-center me-2 text-white" style="background-color: {{\App\Models\Contact::bgColor()}}">
                                {{substr($contact->fullName,0,1)}}
                            </div>
                        @endif


                        <a  href="{{route('contact.show',$contact->id)}}" class="text-decoration-none text-black" >
                            {{$contact->fullName}}
                        </a>

                    </div>
                </td>
                <td class>{{$contact->email}}</td>
                <td class>{{$contact->phone}}</td>
                <td class>
                    @if($contact->jobTitle)
                        {{$contact->jobTitle}},
                    @endif
                    {{$contact->company}}

                </td>
                <td class="">
                    <div class="control-btns" >
                        @if(request()->trash)
                        <form action="{{route('contact.destroy',[$contact->id,'delete'=>'force'])}}" class="me-2 mb-0" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn"><i class="bi bi-trash3"></i></button>
                        </form>
                         <form action="{{route('contact.destroy',[$contact->id,'delete'=>'restore'])}}" class="me-2 mb-0" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn" onclick="confirmDialog()"><i class="bi bi-arrow-repeat"></i></button>
                            </form>
                        @else
                            <form action="{{route('contact.destroy',[$contact->id,'delete'=>'soft'])}}" class="me-2 mb-0" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn"><i class="bi bi-trash3"></i></button>
                            </form>
                            <form action="{{route('contact.copy',$contact->id)}}" class="me-2 mb-0" method="post">
{{--                            <form action="#" class="me-2 mb-0" method="post">--}}
                                @csrf

                                <button class="btn" onclick="showSwal"><i class="bi bi-code"></i></button>
                            </form>

                            <form action="{{route('contact.exportSingle',$contact->id)}}" class="me-2 mb-0" method="post">
                                @csrf
                                <button class="btn" onclick="showSwal"><i class="bi bi-arrow-bar-up"></i></button>
                            </form>
                        @endif
                        <a href="{{route('contact.edit',$contact->id)}}"><i class="bi bi-pencil"></i></a>
                    </div>
                </td>
            </tr>

            @endforeach

            </tbody>
        </table>

        @push('script')
            <script>

                let checkBoxs = document.querySelectorAll('.delCheckbox');
                let selectItem = document.querySelector('.selectItem');
                let tableHead = document.getElementById('tableHead');
                let selectAllDropdown = document.querySelector('.select-all-dropdown');
                let contactPeople = document.querySelector('.contact-people');
                let checkArr = [];
                let NotCheckArr = [];

                selectAllDropdown.style.display = 'none';
                function checkCheckBox(el){
                    checkArr = Array.from(checkBoxs).filter(checkBox => checkBox.checked);
                    NotCheckArr = Array.from(checkBoxs).filter(n => !checkArr.includes(n));

                    selectItem.innerHTML =checkArr.length+" selected"

                    if (checkArr.length > 0){
                        selectAllDropdown.style.display = 'flex';
                        tableHead.style.display = 'none';
                        // console.log(checkArr);

                        checkArr.forEach((checkItem,index) =>{
                            // console.log("contact"+checkItem.id);
                            document.getElementById("contact"+checkItem.id).style.display = 'none';
                        })

                    }else {
                        selectAllDropdown.style.display = 'none';
                        tableHead.style.display = 'block';

                    }

                    NotCheckArr.forEach((checkItem,index) =>{
                        // console.log("contact"+checkItem.id);
                        document.getElementById("contact"+checkItem.id).style.display = 'block';
                    })
                }

                function SelectAll(){
                    Array.from(checkBoxs).forEach(checkBox=>{
                        checkBox.checked = true;
                        document.getElementById("contact"+checkBox.id).style.display = 'none';

                    })
                    selectItem.innerHTML = Array.from(checkBoxs).length+" selected"
                }
                function SelectNone(){
                    Array.from(checkBoxs).forEach(checkBox=>{
                        checkBox.checked = false;
                        document.getElementById("contact"+checkBox.id).style.display = 'block';

                    })
                    selectAllDropdown.style.display = 'none';
                    tableHead.style.display = 'block';
                }

                handleShowRoute=(route)=>{
                    // window.location.href = route;
                }

                let form = document.getElementById('multipleId');

                document.getElementById('multiDel').addEventListener('click',function (e){
                    e.preventDefault();
                    console.log(e);
                    form.setAttribute('action',"{{route('contact.destroyMultiple')}}")
                    form.submit();

                })

                document.getElementById('multiCopy').addEventListener('click',function (e){
                    e.preventDefault();
                    console.log(e);
                    form.setAttribute('action',"{{route('contact.copyMultiple')}}")
                    form.submit();
                })

                document.getElementById('exportMultiple').addEventListener('click',function (e){
                    e.preventDefault();
                    console.log(e);
                    form.setAttribute('action',"{{route('contact.exportMultiple')}}")
                    form.submit();
                })
            </script>
        @endpush
    </div>
@endsection
