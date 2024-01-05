// ----------------------------------------------------------------------------------
//  Clients realisation 
// ----------------------------------------------------------------------------------

function showClientItems(){  
    $.ajax({
        url:"./adminView/viewAllClients.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showAccountItems(){  
    $.ajax({
        url:"./clientView/viewAccount.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function clientEditForm(id){
    $.ajax({
        url:"./adminView/editClientForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function updateClients() {
    var client_id = $('#client_id').val();
    var c_name = $('#c_name').val();
    var c_surname = $('#c_surname').val();
    var c_patronymic = $('#c_patronymic').val();
    var c_email = $('#c_email').val();
    var c_phone = $('#c_phone').val();
    var c_address = $('#c_address').val();

    var fd = new FormData();
    fd.append('client_id', client_id);
    fd.append('c_name', c_name);
    fd.append('c_surname', c_surname);
    fd.append('c_patronymic', c_patronymic);
    fd.append('c_email', c_email);
    fd.append('c_phone', c_phone);
    fd.append('c_address', c_address);

    $.ajax({
        url: './controller/updateClientController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Data Update Success.');
            $('form').trigger('reset');
            showClientItems();
        }
    });
}

function clientAccountEditForm(id) {
    $.ajax({
        url: "./clientView/editAccountForm.php",
        method: "post",
        data: {record: id},
        success: function(data){
            $('.allContent-section').html(data);
        }
    });
}

function updateClientsAccount() {
    var client_id = $('#client_id').val();
    var name = $('#c_name').val();
    var surname = $('#c_surname').val();
    var patronymic = $('#c_patronymic').val();
    var email = $('#c_email').val();
    var phone = $('#c_phone').val();
    var address = $('#c_address').val();
    var password = $('#c_password').val();

    var fd = new FormData();
    fd.append('client_id', client_id);
    fd.append('name', name);
    fd.append('surname', surname);
    fd.append('patronymic', patronymic);
    fd.append('email', email);
    fd.append('phone', phone);
    fd.append('address', address);
    fd.append('password', password);  

    $.ajax({
        url: './controller/updateAccountController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Data Update Success.');
            showAccountItems();
        }
    });
}

//delete client data
function clientDelete(id){
    $.ajax({
        url:"./controller/deleteClientController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Clients Successfully deleted');
            $('form').trigger('reset');
            showClientItems();
        }
    });
}

//add client data
function addClient(){
    var client_name = $('#client_name').val();
    var client_surname = $('#client_surname').val();
    var client_patronymic = $('#client_patronymic').val();
    var client_email = $('#client_email').val();
    var client_phone = $('#client_phone').val();
    var client_address = $('#client_address').val();
    
    var fd = new FormData();
    fd.append('client_name', client_name);
    fd.append('client_surname', client_surname);
    fd.append('client_patronymic', client_patronymic);
    fd.append('client_email', client_email);
    fd.append('client_phone', client_phone);
    fd.append('client_address', client_address);
    fd.append('upload', 'upload');

    $.ajax({
        url: "./controller/addClientController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Client Added successfully.');
            $('form').trigger('reset');
            showClientItems();
        }
    });
}

// ----------------------------------------------------------------------------------
//  Employees realisation 
// ----------------------------------------------------------------------------------

function showEmployeeItems(){  
    $.ajax({
        url:"./adminView/viewAllEmployees.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showClientEmployeeItems(){  
    $.ajax({
        url:"./clientView/viewAllEmployees.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function employeeEditForm(id){
    $.ajax({
        url:"./adminView/editEmployeeForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function updateEmployees() {
    var employee_id = $('#employee_id').val();
    var e_name = $('#e_name').val();
    var e_surname = $('#e_surname').val();
    var e_patronymic = $('#e_patronymic').val();
    var e_email = $('#e_email').val();
    var e_phone = $('#e_phone').val();

    var fd = new FormData();
    fd.append('employee_id', employee_id);
    fd.append('e_name', e_name);
    fd.append('e_surname', e_surname);
    fd.append('e_patronymic', e_patronymic);
    fd.append('e_email', e_email);
    fd.append('e_phone', e_phone);

    $.ajax({
        url: './controller/updateEmployeeController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Data Update Success.');
            $('form').trigger('reset');
            showEmployeeItems();
        }
    });
}

//delete employee data
function employeeDelete(id){
    $.ajax({
        url:"./controller/deleteEmployeeController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Employee Successfully deleted');
            $('form').trigger('reset');
            showEmployeeItems();
        }
    });
}

//add employee data
function addEmployee(){
    var e_name = $('#e_name').val();
    var e_surname = $('#e_surname').val();
    var e_patronymic = $('#e_patronymic').val();
    var e_email = $('#e_email').val();
    var e_phone = $('#e_phone').val();
    
    var fd = new FormData();
    fd.append('e_name', e_name);
    fd.append('e_surname', e_surname);
    fd.append('e_patronymic', e_patronymic);
    fd.append('e_email', e_email);
    fd.append('e_phone', e_phone);
    fd.append('upload', 'upload');

    $.ajax({
        url: "./controller/addEmployeeController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Employee Added successfully.');
            $('form').trigger('reset');
            showEmployeeItems();
        }
    });
}

// ----------------------------------------------------------------------------------
//  Orders realisation 
// ----------------------------------------------------------------------------------

function showOrderItems(){
    $.ajax({
        url:"./adminView/viewAllOrders.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showClientOrderItems(){
    $.ajax({
        url:"./clientView/viewAllOrders.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function ChangeOrderStatus(id) {
    $.ajax({
        url: "./controller/updateOrderStatus.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Order Status updated successfully');
            disableStatusButtons(id, 'order_status');
            showOrderItems();
        }
    });
}

function ChangePay(id) {
    $.ajax({
        url: "./controller/updatePayStatus.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Payment Status updated successfully');
            disableStatusButtons(id, 'pay_status');
            showOrderItems();
        }
    });
}

function disableStatusButtons(id, statusType) {
    // Disable the buttons based on the updated status
    var statusButtons = $('[data-record="' + id + '"][data-status-type="' + statusType + '"]');
    
    statusButtons.prop('disabled', true);
}

function orderEditForm(id) {
    $.ajax({
        url: "./adminView/editOrderForm.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

function orderClientEditForm(id) {
    $.ajax({
        url: "./clientView/editOrderForm.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

function updateOrders() {
    var order_id = $('#order_id').val();
    var client_id = $('#client_id').val();
    var order_date = $('#order_date').val();
    var pay_method = $('#pay_method').val();
    var technique_id = $('#technique_id').val();

    var fd = new FormData();
    fd.append('order_id', order_id);
    fd.append('client_id', client_id);
    fd.append('order_date', order_date);
    fd.append('pay_method', pay_method);
    fd.append('technique_id', technique_id);

    $.ajax({
        url: './controller/updateOrderController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Order Updated Successfully.');
            $('form').trigger('reset');
            showOrderItems();
        }
    });
}

function updateClientOrders() {
    var order_id = $('#order_id').val();
    var order_date = $('#order_date').val();
    var pay_method = $('#pay_method').val();

    var fd = new FormData();
    fd.append('order_id', order_id);
    fd.append('order_date', order_date);
    fd.append('pay_method', pay_method);

    $.ajax({
        url: './controller/updateClientOrderController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data === 'true') {
                alert('Order Updated Successfully.');
                $('form').trigger('reset');
                showClientOrderItems();
            } else {
                alert('Error updating order. Please check the data.');
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

function orderDelete(id) {
    $.ajax({
        url: "./controller/deleteOrderController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Order Successfully Deleted');
            $('form').trigger('reset');
            showOrderItems();
        }
    });
}

function orderClientDelete(id) {
    $.ajax({
        url: "./controller/deleteOrderController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Order Successfully Deleted');
            $('form').trigger('reset');
            showClientOrderItems();
        }
    });
}

//add order data
function addOrder() {
    var client_id = $('#client_email').val();
    var order_date = $('#order_date').val();
    var pay_method = $('#pay_method').val();
    var technique_id = $('#technique_id').val();

    var fd = new FormData();
    fd.append('client_id', client_id);
    fd.append('order_date', order_date);
    fd.append('pay_method', pay_method);
    fd.append('technique_id', technique_id);
    fd.append('upload', 'upload');

    $.ajax({
        url: "./controller/addOrderController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Order Added successfully.');
            $('form').trigger('reset');
            showOrderItems();
        }
    });
}

function addOrderClient() {
    var order_date = $('#order_date').val();
    var pay_method = $('#pay_method').val();
    var technique_id = $('#technique_id').val();

    var fd = new FormData();
    fd.append('order_date', order_date);
    fd.append('pay_method', pay_method);
    fd.append('technique_id', technique_id);
    fd.append('upload', 'upload');

    $.ajax({
        url: "./controller/addOrderClientController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Order Added successfully.');
            $('form').trigger('reset');
            showOrderItems();
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

// ----------------------------------------------------------------------------------
//  Categories realisation 
// ----------------------------------------------------------------------------------

function showCategoryItems(){  
    $.ajax({
        url:"./adminView/viewCategories.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showClientCategoryItems(){  
    $.ajax({
        url:"./clientView/viewCategories.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function categoryEditForm(id){
    $.ajax({
        url: "./adminView/editCategoryForm.php",
        method: "post",
        data: {record: id},
        success: function(data){
            $('.allContent-section').html(data);
        }
    });
}

function updateCategories() {
    var category_id = $('#category_id').val();
    var name = $('#category_name').val();  

    var fd = new FormData();
    fd.append('category_id', category_id);
    fd.append('name', name);

    $.ajax({
        url: './controller/updateCategoryController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Data Update Success.');
            $('form').trigger('reset');
            showCategoryItems();
        }
    });
}


//delete category data
function categoryDelete(id){
    $.ajax({
        url: "./controller/deleteCategoryController.php",
        method: "post",
        data: {record: id},
        success: function(data){
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showCategoryItems();
        }
    });
}

//add category data
function addCategory(){
    var category_name = $('#category_name').val();
    
    var fd = new FormData();
    fd.append('category_name', category_name);
    fd.append('upload', 'upload');

    $.ajax({
        url: "./controller/addCategoryController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Category Added successfully.');
            $('form').trigger('reset');
            showCategoryItems();
        }
    });
}

// ----------------------------------------------------------------------------------
//  Services realisation 
// ----------------------------------------------------------------------------------

function showServiceItems(){  
    $.ajax({
        url:"./adminView/viewServices.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showClientServiceItems(){  
    $.ajax({
        url:"./clientView/viewServices.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function serviceEditForm(id){
    $.ajax({
        url: "./adminView/editServiceForm.php",
        method: "post",
        data: {record: id},
        success: function(data){
            $('.allContent-section').html(data);
        }
    });
}

function updateServices() {
    var service_id = $('#service_id').val();
    var description = $('#service_description').val();
    var price = $('#service_price').val();
    var category_id = $('#category').val();  

    var fd = new FormData();
    fd.append('service_id', service_id);
    fd.append('description', description);
    fd.append('price', price);
    fd.append('category_id', category_id);

    $.ajax({
        url: './controller/updateServiceController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Data Update Success.');
            $('form').trigger('reset');
            showServiceItems();
        }
    });
}

//delete service data
function serviceDelete(id){
    $.ajax({
        url: "./controller/deleteServiceController.php",
        method: "post",
        data: {record: id},
        success: function(data){
            alert('Service Successfully deleted');
            $('form').trigger('reset');
            showServiceItems();
        }
    });
}

//add service data
function addService(){
    var service_description = $('#service_description').val();
    var service_price = $('#service_price').val();
    var category_id = $('#category').val();  
    
    var fd = new FormData();
    fd.append('description', service_description); 
    fd.append('price', service_price); 
    fd.append('category_id', category_id);
    fd.append('upload', 'upload');

    $.ajax({
        url: "./controller/addServiceController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Service Added successfully.');
            $('form').trigger('reset');
            showServiceItems();
        }
    });
}

// ----------------------------------------------------------------------------------
//  Techniques realisation 
// ----------------------------------------------------------------------------------

function showTechniqueItems(){  
    $.ajax({
        url:"./adminView/viewTechniques.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showClientTechniqueItems(){  
    $.ajax({
        url:"./clientView/viewTechniques.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function techniqueEditForm(id){
    $.ajax({
        url: "./adminView/editTechniqueForm.php", 
        method: "post",
        data: {record: id},
        success: function(data){
            $('.allContent-section').html(data);
        }
    });
}

function updateTechniques() {
    var technique_id = $('#technique_id').val();  
    var name = $('#technique_name').val();  
    var description = $('#technique_description').val();  
    var category_id = $('#category').val();
    var employee_id = $('#employee_email').val();  

    var fd = new FormData();
    fd.append('technique_id', technique_id);
    fd.append('category_id', category_id);
    fd.append('employee_id', employee_id);
    fd.append('technique_description', description);  
    
    $.ajax({
        url: './controller/updateTechniqueController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Technique Updated Successfully.');
            $('form').trigger('reset');
            showTechniqueItems();
        }
    });
}

//delete technique data
function techniqueDelete(id){
    $.ajax({
        url: "./controller/deleteTechniqueController.php",  
        method: "post",
        data: {record: id},
        success: function(data){
            alert('Technique Successfully deleted');
            $('form').trigger('reset');
            showTechniqueItems();  
        }
    });
}

//add technique data
function addTechnique(){
    var technique_name = $('#technique_name').val();
    var technique_description = $('#technique_description').val();
    var category_id = $('#category').val();
    var employee_id = $('#employee_email').val();

    var fd = new FormData();
    fd.append('technique_name', technique_name);
    fd.append('technique_description', technique_description);
    fd.append('category_id', category_id);
    fd.append('employee_email', employee_id);
    fd.append('upload', 'upload');

    $.ajax({
        url: "./controller/addTechniqueController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Technique Added successfully.');
            $('form').trigger('reset');
            showTechniqueItems();
        }
    });
}

// add client technique data
function addClientTechnique() {
    var category_id = $('#category').val();
    var technique_name = $('#technique_name').val();
    var technique_description = $('#technique_description').val();
    var employee_id = $('#employee_email').val();

    var fd = new FormData();
    fd.append('category_id', category_id);
    fd.append('technique_name', technique_name);
    fd.append('technique_description', technique_description);
    fd.append('employee_id', employee_id);
    fd.append('upload', 'upload');

    $.ajax({
        url: "./controller/addClientTechniqueController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Technique Added successfully.');
            $('form').trigger('reset');
            showClientTechniqueItems();
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}