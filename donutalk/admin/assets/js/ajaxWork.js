function showProductItems(){  
    $.ajax({
        url:"./adminView/viewAllProducts.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showCategory(){  
    $.ajax({
        url:"./adminView/viewCategories.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showSales(){  
    $.ajax({
        url:"./adminView/viewSales.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function changeItemStatus(id, status){
    $.ajax({
       url:"./controller/updateItemStatus.php",
       method:"post",
       data:{record:id, status: status},
       success:function(data){
           alert('Item Status updated successfully');
           $('form').trigger('reset');
           showProductItems();
       }
   });
}

function showFeedbacks() {
    $.ajax({
        url: "./adminView/viewFeedback.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

function showCustomers(){
    $.ajax({
        url:"./adminView/viewCustomers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showOrders(){
    $.ajax({
        url:"./adminView/viewAllOrders.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function ChangeOrderStatus(id){
    $.ajax({
       url:"./controller/updateOrderStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Order Status updated successfully');
           $('form').trigger('reset');
           showOrders();
       }
   });
}

function ChangePay(id){
    $.ajax({
       url:"./controller/updatePayStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Payment Status updated successfully');
           $('form').trigger('reset');
           showOrders();
       }
   });
}

function addItems(){
    var i_name=$('#i_name').val();
    var i_desc=$('#i_desc').val();
    var i_price=$('#i_price').val();
    var i_status=$('#i_status').val();
    var upload=$('#upload').val();
    var file=$('#file')[0].files[0];

    var fd = new FormData();
    fd.append('i_name', i_name);
    fd.append('i_desc', i_desc);
    fd.append('i_price', i_price);
    fd.append('i_status', i_status);
    fd.append('file', file);
    fd.append('upload', upload);
    
    $.ajax({
        url:"./controller/addItemController.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Product Added successfully.');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

function itemEditForm(id){
    $.ajax({
        url:"./adminView/editItemForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function updateItems() {
    var item_id = $('#item_id').val();
    var p_name = $('#item_name').val();
    var p_desc = $('#item_desc').val();
    var p_price = $('#item_price').val();
    var p_status = $('input[name=item_status]:checked').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];

    var fd = new FormData();
    fd.append('product_id', item_id);
    fd.append('p_name', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('p_status', p_status);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);

    $.ajax({
        url: './controller/updateItemController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data === 'true') {
                alert('Data Update Success.');
                showProductItems();
            } else {
                alert('Data Update Failed.');
            }
        }
    });
}

function itemDelete(id){
    $.ajax({
        url:"./controller/deleteItemController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Items Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

function addCategories() {
    var c_name = $('#c_name').val();
    var c_qty = $('#c_qty').val();

    var fd = new FormData();
    fd.append('c_name', c_name);
    fd.append('c_qty', c_qty);

    $.ajax({
        url: "./controller/addCatController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Category Added successfully.');
            $('form').trigger('reset');
            showCategory();
        }
    });
}

function categoryEditForm(id){
    $.ajax({
        url:"./adminView/editCatForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function updateCategories() {
    var category_id = $('#cat_id').val();
    var c_name = $('#cat_name').val();
    var c_quantity = $('#cat_qty').val();

    var fd = new FormData();
    fd.append('category_id', category_id);
    fd.append('c_name', c_name);
    fd.append('c_quantity', c_quantity);

    $.ajax({
        url: './controller/updateCatController.php',
        method:'post',
        data:fd,
        processData:false,
        contentType:false,
        success: function (data) {
            if (data.trim()==='true') {  // Trim the data to remove any whitespace
                alert('Data Update Success.');
                showCategory();
            } else {
                alert('Data Update Failed.');
            }
        }
    });
}

function categoryDelete(id){
    $.ajax({
        url:"./controller/catDeleteController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showCategory();
        }
    });
}