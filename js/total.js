/**
 * Created by zain on 9/30/15.
 */
function Total(str,articleId){
//alert("hello");
/*var quantity=document.getElementById(quantity1).value;
var price=document.getElementById("price").innerHTML;
var total_Amount=quantity*price;
document.getElementById("price").innerHTML=quantity1;
*/
  // document.getElementById("alpha").innerHTML=str;
   // document.getElementById("alpha").innerHTML=articleId;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("alpha").innerHTML = "";
  //     alert    (ok);
        }
    }

    xmlhttp.open("GET", "insertQuantity.php?q=" + str+"&a="+articleId , true);
    xmlhttp.send();



}

function addWish(str){

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            var t=xmlhttp.responseText;
            notie.alert(3, t , 1);
            if(t==="Your wish has been added!"){
                var h=document.getElementById("wishno").innerText;
                var p = parseInt(h, 10);
                p++;
                f=p.toString()
                document.getElementById("wishno").innerHTML='<i class="fa fa-heart fa-fw"></i>  '+f;
            }


        }
    }

    xmlhttp.open("GET", "addWish.php?a=" + str , true);
    xmlhttp.send();
}


function addWishSale(str){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            notie.alert(3, 'Wish Added!', 1);


        }
    }

    xmlhttp.open("GET", "addWish.php?a=" + str , true);
    xmlhttp.send();
}




function addWishNewCollection(str){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            notie.alert(3, 'Wish Added!', 1);


        }
    }

    xmlhttp.open("GET", "addWish.php?a=" + str , true);
    xmlhttp.send();
}



function addWishFeatured(str){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            notie.alert(3, 'Wish Added!', 1);


        }
    }

    xmlhttp.open("GET", "addWish.php?a=" + str , true);
    xmlhttp.send();
}




function removewish(str){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var newLocation = "wishlist.php";
            window.location = newLocation;
        }
    }

    xmlhttp.open("GET", "removeWish.php?a=" + str , true);
    xmlhttp.send();
}



function removeitem(userId,articleNo,trackingNo){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var newLocation = " cart.php?articleId=-9999";
            window.location = newLocation;
            //header("location:shopping_cart.php");
        }
    }
    xmlhttp.open("GET", "removeitemcart.php?userId=" + userId + "&articleNo=" +  articleNo + "&trackingNo=" +trackingNo , true);
    xmlhttp.send();
}


function addtocart(article){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            notie.alert(3, 'Added to Cart!', 1);
        }
    }
    xmlhttp.open("GET", "shopping_cart.php?articleId=" + article , true);
    xmlhttp.send();
}


function changequantity(quantity,userId,articleNo,trackingNo,price){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var newLocation = "cart.php?articleId=-9999";
            window.location = newLocation;
        }
    }
    xmlhttp.open("GET", "changequantity.php?userId=" + userId + "&articleNo=" +  articleNo + "&trackingNo=" +trackingNo + "&quantity=" +quantity + "&price=" +price, true);
    xmlhttp.send();
}


function insertquantityinshoppingcart(){

    var quantity=document.getElementById("quantity").value;
    var articleId=document.getElementById("articleId").value;
    var color=document.getElementById("color").value;
    var size=document.getElementById("size").value;
    alert(quantity);
    alert(articleId);
    alert(size);
    alert(color);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var newLocation = "cart.php?articleId="+articleId+"&quantity=" + quantity+"&color="+ color +"&size="+ size ;
            window.location = newLocation;
            //header("location:shopping_cart.php");
        }
    }
    xmlhttp.open("GET", "cart.php?quantity=" + quantity +"&articleId=" + articleId +"&color="+ color +"&size="+ size , true);
    xmlhttp.send();
}


function addtocartSale(article){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            notie.alert(3, 'Added to Cart!', 1);
        }
    }
    xmlhttp.open("GET", "shopping_cart.php?articleId=" + article , true);
    xmlhttp.send();
}





function addtocartNew(article){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            notie.alert(3, 'Added to Cart!', 1);
        }
    }
    xmlhttp.open("GET", "cart.php?articleId=" + article , true);
    xmlhttp.send();
}


function addtocartNewfeatured(article){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("wishaddedFeatured").innerHTML = "Added to cart!";
        }
    }
    xmlhttp.open("GET", "cart.php?articleId=" + article , true);
    xmlhttp.send();
}






function insertquantityinshoppingcart(){

    var quantity=document.getElementById("quantity").value;
    var articleId=document.getElementById("articleId").value;
    alert(quantity);
    alert(articleId);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var newLocation = "cart.php?articleId="+articleId+"&quantity=" + quantity;
            window.location = newLocation;
            //header("location:shopping_cart.php");
        }
    }
    xmlhttp.open("GET", "cart.php?quantity=" + quantity +"&articleId=" + articleId , true);
    xmlhttp.send();
}

