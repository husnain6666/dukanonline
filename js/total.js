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
            document.getElementById("wishadded").innerHTML = xmlhttp.responseText;


        }
    }

    xmlhttp.open("GET", "addWish.php?a=" + str , true);
    xmlhttp.send();
}

function addWishSale(str){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("wishaddedSale").innerHTML = xmlhttp.responseText;


        }
    }

    xmlhttp.open("GET", "addWish.php?a=" + str , true);
    xmlhttp.send();
}




function addWishNewCollection(str){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("wishaddedNewCollection").innerHTML = xmlhttp.responseText;


        }
    }

    xmlhttp.open("GET", "addWish.php?a=" + str , true);
    xmlhttp.send();
}



function addWishFeatured(str){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("wishaddedFeatured").innerHTML = xmlhttp.responseText;


        }
    }

    xmlhttp.open("GET", "addWish.php?a=" + str , true);
    xmlhttp.send();
}




function removewish(str,rowid){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            header("Refresh:0; url=wishlist.php");
        }
    }

    xmlhttp.open("GET", "removeWish.php?a=" + str , true);
    xmlhttp.send();
}




function addtocart(article){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("wishadded").innerHTML = "Added to cart!";
        }
    }
    xmlhttp.open("GET", "shopping_cart.php?articleId=" + article , true);
    xmlhttp.send();
}


function addtocartSale(article){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("wishaddedSale").innerHTML = "Added to cart!";
        }
    }
    xmlhttp.open("GET", "shopping_cart.php?articleId=" + article , true);
    xmlhttp.send();
}





function addtocartNew(article){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("wishaddedNewCollection").innerHTML = "Added to cart!";
        }
    }
    xmlhttp.open("GET", "shopping_cart.php?articleId=" + article , true);
    xmlhttp.send();
}


function addtocartNewfeatured(article){


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("wishaddedFeatured").innerHTML = "Added to cart!";
        }
    }
    xmlhttp.open("GET", "shopping_cart.php?articleId=" + article , true);
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
            var newLocation = "shopping_cart.php?articleId="+articleId+"&quantity=" + quantity;
            window.location = newLocation;
            //header("location:shopping_cart.php");
        }
    }
    xmlhttp.open("GET", "shopping_cart.php?quantity=" + quantity +"&articleId=" + articleId , true);
    xmlhttp.send();
}

