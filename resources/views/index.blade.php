<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Billing system</title>
   </head>
<body>
      <section class="mt-3">
         <div class="container-fluid">
            <div class="card text-center">
                <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                    <a class="nav-link " aria-current="true" href="#">Billing Status</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="#">Manage Subscriptions</a>
                    </li>
                </ul>
                </div>
                <div class="card-body">
                    <div class="card">
                        <h5 class="card-header float-left">Add Subscriptions</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col ml-5">
                                    <div class="row">
                                        <div class="col-3">
                                            <b>Product</b>
                                        </div>
                                            <div class="col-6">
                                                <select name="product" id="product"  class="form-control">
                                                    <option  >--- Select Product ---</option>
                                                    @foreach ($products as $product)
                                                        <option id="{{$product->id}}" value="{{$product->product_name}}" class="product custom-select"> {{$product->product_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">
                                                    Add Product
                                                  </button>
                                            </div>
                                        
                                    
                                                <!-- Modal -->
                                                <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="text" placeholder="Enter product name" class="form-control" name="productName" id="productName">
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" id="save-product" class="btn btn-primary btn-sm">Save</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-3">
                                            <b>Package</b>
                                        </div>
                                            <div class="col-6">
                                                <select name="package" id="package"  class="form-control">
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#packageModal">
                                                    Add Package
                                                  </button>
                                            </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="packageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add New Package</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <select name="product" id="product_id"  class="form-control">
                                                                <option  >--- Select Product ---</option>
                                                                @foreach ($products as $product)
                                                                    <option id="{{$product->id}}" value="{{$product->product_name}}" class="product custom-select"> {{$product->product_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="text" placeholder="Enter package name" class="form-control mt-3" name="packageName" id="packageName">
                                                            <input type="number" placeholder="Enter price" class="form-control mt-3" name="packagePrice" id="packagePrice">
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" id="save-package" class="btn btn-primary btn-sm">Save</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-3">
                                            <b>Price (Tk)</b>
                                        </div>
                                        <div class="col-3">
                                            <b id="price"></b>
                                        </div>
                                        <div class="col-6">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-3">
                                            <b>Items</b>
                                        </div>
                                        <div class="col-6">
                                            <input type="number" id="item"  class="form-control">
                                        </div>
                                        <div class="col-3">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4 pr-0 mr-0">
                                        </div> 
                                        <div class="col-8 ">
                                            <button id="addSubscription" class="btn btn-warning btn-block">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col ml-5">
                                    <div class="row">
                                        <b >Subscription Cart</b>
                                    </div>
                                    <div class="row">
                                        <table  id="subscription-cart" class="table table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product</th>
                                                    <th>Package</th>
                                                    <th>Price (Tk)</th>
                                                    <th>Item</th>
                                                    <th>Total(Tk)</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-row" class="mb-5">
                                               
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row mt-3" >
                                        <button id="saveSubscriptions" type="button" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      
      </section>
   </body>
</html>




<script>
    $(document).ready(function(){
    var productId;   
    var packageId; 
    var count = 1;
     var  subscriptions = [];  
$('#product').change(function() {
      productId =   $(this).find(':selected')[0].id;
        $.ajax({
           type:'GET',
           url:'get-packages/{Productid}',
            data:{
                productId : productId
            },
           dataType:'json',
           success:function(data)
             {
                $("#package").empty();
                $('#package').append($('<option>', { 
                        value:'',
                        text : '--Select Package--' 
                    }));
                $.each(data.packages, function (i, package) {
                    $('#package').append($('<option>', { 
                        id: package.id,
                        value: package.package_name,
                        text : package.package_name 
                    }));
                });
             }
        }); 
      }); 
 $('#package').change(function() {
      packageId =   $(this).find(':selected')[0].id;
        $.ajax({
           type:'GET',
           url:'get-price/{packageId}',
            data:{
                packageId : packageId
            },
           dataType:'json',
           success:function(data)
             {
               $('#price').text(data.package.price)
             }
        }); 
      });  
   
 $('#product_id').change(function() {
    productId =   $(this).find(':selected')[0].id;
      });     
$('#save-product').click(function() 
{
    const productName  = $('#productName').val();
    if(productName){
           $.ajax({
           type:'POST',
           url:'add-product',
           data:{
                "_token": "{{ csrf_token() }}",    
                name: productName
            },
           dataType:'json',
           success:function(data)
             {
                 $('#productModal').hide();
             }
        }); 
         }
      });
$('#save-package').click(function() 
{
    const packageName  = $('#packageName').val();
    const packagePrice  = $('#packagePrice').val();
    if(packageName){
           $.ajax({
           type:'POST',
           url:'add-package',
           data:{
                "_token": "{{ csrf_token() }}",    
                name: packageName,
                price: packagePrice,
                product_id: productId
            },
           dataType:'json',
           success:function(data)
             {
                 $('#packageModal').hide();
             }
        }); 
         }
      });
$('#saveSubscriptions').click(function() 
{
    if(subscriptions.length > 0){
           $.ajax({
           type:'POST',
           url:'add-subscriptions',
           data:{
                "_token": "{{ csrf_token() }}",    
                subscriptions: subscriptions,
            },
           dataType:'json',
           success:function(data)
             {
               $('#table-row').empty();
               subscriptions = [];

             }
        }); 
         }
         else{
            alert('No Data Found!');
         }
      });
     
      //add to cart 
 count = 1;
      subscriptions = [];
   $('#addSubscription').on('click',function(){
         var product = $('#product').val();
         var package = $('#package').val();
         var item = $('#item').val(); 
         var price = $('#price').text(); 
         if(product && package && item) {
                var total = 0;
               $("#subscription-cart").each(function () {
               var total =  Number(price) *item;
               var subTotal = 0;
               subTotal += parseInt(total);
               
               var table =   '<tr><td>'+ count +'</td><td>'+ product + '</td><td>' + package + '</td><td>' + price + '</td><td>' + item +'</td><td>' +total+ '</td></tr>';
               $('#table-row').append(table)
                subscriptions.push({
                    product_id: productId,
                    package_id: packageId,
                    total_amount: total
                });
              });
              count++;
           
                $('#product').val('');
              $('#package').val('');
              $('#item').val(''); 
            $('#price').text(''); 
            console.log(subscriptions);
         }else{
            alert('Please fill up all the fields.');
         }
         
        });
    });
   
              
            
     
 </script>