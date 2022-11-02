import './bootstrap';
import Swal from "sweetalert2";

Window.showConfirm = function (url){

    swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
    console.log("this is showConfirm")
}

window.showSwal = function (){
    e.preventDefault();
    console.log('this is swal')
}





