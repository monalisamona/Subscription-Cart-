// visitor page table
$(document).ready(function () {
    $('#VisitorDt').DataTable();
    $('.dataTables_length').addClass('bs-select');
    });

// for services table
    function getServicesData(){
        axios.get('/getServicesData')
        .then(function(response){
            if(response.status==200){
                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');
                $('#service_table').empty();
                var jsonData=response.data;
            $.each(jsonData,function(i,item){
                $('<tr>').html(
                    "<td> <img class='table-img' src="+jsonData[i].service_img+"> </td>"+
                    "<td> "+jsonData[i].service_name+"</td>"+
                    "<td>"+jsonData[i].service_des+" </td>"+
                    "<td> <a class='serviceEditBtn' data-id="+jsonData[i].id+" ><i class='fas fa-edit'></i></a> </td>"+
                    "<td> <a class='serviceDeleteBtn' data-id="+jsonData[i].id+"  ><i class='fas fa-trash-alt'></i></a></td>"
                ).appendTo('#service_table');
            });

            // services table delete icon click

            $('.serviceDeleteBtn').click(function(){
                var id=$(this).data('id');
                $('#serviceDeleteId').html(id);
                $('#deleteModal').modal('show');

            })

            // services delete modal yes button

            $('#serviceDeleteConfirmBtn').click(function(){   
                var id=$('#serviceDeleteId').html();
                getServiceDelete(id);
                
            })


            // servicesa table edit icon click

            $('.serviceEditBtn').click(function(){

                var id=$(this).data('id');
                $('#serviceEditId').html(id);
                $('#editModal').modal('show');

            })

        }  
            else{
                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');

            }

        })
        .catch(function(error){
            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');
        });
       }

            // service delete

        function getServiceDelete(deleteID){
            axios.post('/ServiceDelete',{id:deleteID})
            .then(function(response){
                if(response.data==1){
                    $('#deleteModal').modal('hide');
                    toastr.error('delete fail');
                    getServicesData();
                }
                else{
                    $('#deleteModal').modal('show');
                    toastr.error('delete fail');
                    getServicesData();
                }

            })
            .catch(function(error){
               
            });
           }
        
    