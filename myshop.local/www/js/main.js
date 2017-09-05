/**
 * Функция добавлени товара в корзину
 * @param {type} itemId
 * @returns Обновятся данные корзины а страницы
 */
function addToCart(itemId){
    console.log("js - addToCart()");
    //alert(itemId);
    $.ajax({
        type: 'POST',
        async: false,
        url: "/myshop.local/www/cart/addtocart/" + itemId + '/',
        dataType: 'json',
        success: function(data){
            //alert(data['success']);
            if(data['success']){
                //alert("d");
                $('#cartCntItems').html(data['cntItems']);
                $('#addCart_'+itemId).hide();
                $('#removeCart_'+itemId).show();
            }
        }
    }); 
}   

function removeFromCart(itemId){
    
    console.log("js - removeFromCart("+itemId+")");
    $.ajax({
        type: 'POST',
        async: false,
        url: "/myshop.local/www/cart/removefromcart/"+itemId+'/',
        dataType: 'json',
        success: function(data){
            if(data['success']){
                
                $('#cartCntItems').html(data['cntItems']);
                $('#addCart_'+itemId).show();
                $('#removeCart_'+itemId).hide();
            }
        }
    });
    
}

function conversionPrice(itemId){
    var newCnt = $('#itemCnt_'+itemId).val();
    var itemPrice = $('#itemPrice_'+itemId).attr('value');
    var itemRealPrice = newCnt * itemPrice;
    
    $('#itemRealPrice_'+itemId).html(itemRealPrice);
}

/**
 * 
 * Получение данных с формы
 */
function getData(obj_form){
    
    var hData = {};
    $('input,textarea,select',obj_form).each(function(){
       // alert(this.name);
        if(this.name && this.name !=''){
            hData[this.name] = this.value;
            console.log('hData['+this.name+'] = '+hData[this.name]);
        }
    });
    
    return hData;
}

function registerNewUser(){
    
    var postData = getData('#registerBox');
    
    $.ajax({
        
        type:'POST',
        async: false,
        url: "/myshop.local/www/user/register/",
        data: postData,
        dataType: 'json',
        success: function(data){
            
            if(data['success']){
                alert("Регистрация успешно завершена");
                
                //>блок в левом столбце
                $('#registerBox').hide();
                
                $('#userLink').attr('href', '/myshop.local/www/user/');
                $('#userLink').html(data['userName']);
                $('#userBox').show();
                //<
                
                //>Страница заказа
                $('#loginBox').hide();
                $('#btnSaveOrder').show();
                //<
            } else {
                alert(data['message']);
            }
        }
    });
}

function login(){
    
    var email = $('#loginEmail').val();
    var pwd = $('#loginPwd').val();
    
    var postData = "email="+email+"&pwd="+pwd;
    
    $.ajax({
        type:'POST',
        async: false,
        url: "/myshop.local/www/user/login/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#registerBox').hide();
                $('#loginBox').hide();
                //alert("ff");$('#fff').hide();
                //alert(data('success'));
//                $('#userLink').attr('href', '/myshop.local/www/user/');
//                $('#userLink').html("YOU");
//                $('#userBox').show();
                
                $('#userLink').attr('href', '/myshop.local/www/user/');
                $('#userLink').html(data['displayName']);
                $('#userBox').show();
              
                //>Заполняем поля на странице заказа
                $('#name').val(data['name']);
                $('#phone').val(data['phone']);
                $('#adress').val(data['adress']);
                //<
                $('#btnSaveOrder').show();
            } else {
                alert(data['message']);
            }
        }
    });
}

function showRegisterBox(){
    //var title = $( "#test" ).attr( "color" );
    //$('#test').hide();
    //alert(test.getAttribute("color"));
    //$('#registerBoxHidden').css('display','none');
    //alert($('#registerBoxHidden').attr('display'));
    //document.getElementById('menuCaption').style.color='red';
    
    	//var myText = document.getElementById("test");
      //  alert(myText.style.color);
        
//        var myText = document.getElementById("r");
//        alert(myText.style.color);

    if($('#registerBoxHidden').css('display') !== 'block'){
       $('#registerBoxHidden').show(); 
       //alert("kk");
    } else {
        //alert("kk1");
        $('#registerBoxHidden').hide(); 
    }
    
}

function updateUserData(){
    
    console.log("js-  updateUserData()");
    var phone = $('#newPhone').val();
    var adress = $('#newAdress').val();
    var pwd1 = $('#newPwd1').val();
    var pwd2 = $('#newPwd2').val();
    var curPwd = $('#curPwd').val();
    var name = $('#newName').val();
    
    //alert("curPwd="+curPwd);
    //alert("pwd1="+pwd1);
    
    var postData = {phone: phone,
                    adress: adress,
                    pwd1: pwd1,
                    pwd2: pwd2,
                    curPwd: curPwd,
                    name: name};
               // alert(curPwd);
                
    $.ajax({
       type: 'POST',
       async: false,
       url: "/myshop.local/www/user/update/",
       data: postData,
       dataType: 'json',
       success: function(data){
           
           if(data['success']){
               $('#userLink').html(data['userName']);
               alert(data['message']);
           } else {
               alert(data['message']);
           }
       }
    });
}

function saveOrder(){
    
    var postData = getData('form');
    $.ajax({
       type: 'POST',
       async: false,
       url: "/myshop.local/www/cart/saveorder/",
       data: postData,
       dataType: 'json',
       success: function(data){
           if(data['success']){
               alert(data['message']);
               document.location = '/myshop.local/www/';
           } else {
               alert(data['message']);
           }
           
           
       }
    });
    
    
}

function showProducts(id){
    
    var objName = "#purchasesForOrderId_" + id;
    if($(objName).css('display') != 'table-row'){
        
        $(objName).show();
    } else {
        $(objName).hide();
    }
}