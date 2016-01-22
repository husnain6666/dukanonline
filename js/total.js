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


function insertonlyquantityinshoppingcart(){

    // alert("ok");

    var quantity=document.getElementById("quantity").value;
    var articleId=document.getElementById("articleId").value;
    alert(quantity);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var newLocation = "cart.php?articleId="+articleId+"&quantity=" + quantity ;
            window.location = newLocation;
            //header("location:shopping_cart.php");
        }
    }
    xmlhttp.open("GET", "cart.php?quantity=" + quantity +"&articleId=" + articleId , true);
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


var currentURL = window.location.href;
var count = 0;
count = document.getElementById("hiddenCmpListCounter").innerHTML;



function clearCompare() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('firstComp').innerHTML = "No Item Selected";
            document.getElementById('secComp').innerHTML = "No Item Selected";
            document.getElementById('thirdComp').innerHTML = "No Item Selected";
            document.getElementById('firstCompName').innerHTML = "No Item Selected";
            document.getElementById('secCompName').innerHTML = "No Item Selected";
            document.getElementById('thirdCompName').innerHTML = "No Item Selected";
        }
    }
    xmlhttp.open("GET", "addToCompareList.php?articleId=" + '-1' , true);
    xmlhttp.send();

    count = 0;
    notie.alert(1, "Compare List Cleared!", 2)
}

function addToCompare(id, name) {


    if(count == 0 && id != document.getElementById('secComp').innerHTML && id != document.getElementById('thirdComp').innerHTML)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('firstComp').innerHTML = id;
                document.getElementById('firstCompName').innerHTML = name;
            }
        }
        xmlhttp.open("GET", "addToCompareList.php?articleId=" + id , true);
        xmlhttp.send();

        count++;
    }
    else if(count == 1 && id != document.getElementById('firstComp').innerHTML && id != document.getElementById('thirdComp').innerHTML)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('secComp').innerHTML = id;
                document.getElementById('secCompName').innerHTML = name;
            }
        }
        xmlhttp.open("GET", "addToCompareList.php?articleId=" + id , true);
        xmlhttp.send();

        count++;
    }
    else if(count == 2 && id != document.getElementById('firstComp').innerHTML && id != document.getElementById('secComp').innerHTML)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('thirdComp').innerHTML = id;
                document.getElementById('thirdCompName').innerHTML = name;
            }
        }
        xmlhttp.open("GET", "addToCompareList.php?articleId=" + id , true);
        xmlhttp.send();

        count++;
    }

    else if(count > 2)
    {
        notie.alert(3, "No more than 3 items can be compared simultaneously!", 2);
    }

    else if(id == document.getElementById('firstComp').innerHTML || id == document.getElementById('secComp').innerHTML || id == document.getElementById('thirdComp').innerHTML)
    {
        notie.alert(3, "Item already in compare list!", 2);
    }
    notie.alert(1, 'Added To Compare List!', 2);
}

function compareBtnPress() {
    var firstComp = document.getElementById("firstComp").innerHTML;
    var secComp = document.getElementById("secComp").innerHTML;
    var thirdComp = document.getElementById("thirdComp").innerHTML;

    if(firstComp != "No Item Selected" && secComp != "No Item Selected")
    {
        window.location = "category-grid.php?compItem1=" +firstComp+ "&compItem2=" +secComp+ "&compItem3=" +thirdComp;
    }
    else
    {
        notie.alert(3, "Please select atleast 2 items to compare", 2);
    }
}

var color = null;
function shopBy()
{
    var x = document.getElementById("price-range").value.split(';');
    var minPrice = x[0];
    var maxPrice = x[1];

    if(currentURL.search('minPrice=') == -1) {
        if(currentURL.search('[?]') == -1) {
            window.location = currentURL + "?minPrice=" + minPrice + "&maxPrice=" + maxPrice + "&color=" + color;
        }
        else {
            window.location = currentURL + "&minPrice=" + minPrice + "&maxPrice=" + maxPrice + "&color=" + color;
        }
    }
    else {
        var shopByRegex = /minPrice[=][0-9]+[&]maxPrice[=][0-9]+[&]color[=][a-z]+/;
        var results = shopByRegex.exec( currentURL );
        if( results != null )
        {
            currentURL = currentURL.replace(shopByRegex, "minPrice=" + minPrice + "&maxPrice=" + maxPrice + "&color=" + color);
            window.location.href = currentURL;
        }
        else notie.alert(3, "Not Found!", 2);
    }
}

function clearShopBy()
{
    window.location = "category-grid.php";
}

function selectedColor(id)
{
    color = id;
}

function sortBy(type) {
    if (currentURL.search('sortBy=') == -1) {
        if (currentURL.search('[?]') == -1) {
            window.location = currentURL + "?sortBy=" + type;
        }
        else {
            window.location = currentURL + "&sortBy=" + type;
        }
    }
    else {
        var sortByRegex = /sortBy[=][a-z|_]+/;
        var results = sortByRegex.exec( currentURL );
        if( results != null )
        {
            currentURL = currentURL.replace(sortByRegex, "sortBy=" + type);
            window.location.href = currentURL;
        }
        else notie.alert(3, "Not Found!", 2);
    }
}

function perPage(items)
{
    if(currentURL.search('perPage=') == -1) {
        if(currentURL.search('[?]') == -1) {
            window.location = currentURL + "?perPage=" + items;
        }
        else {
            window.location = currentURL + "&perPage=" + items;
        }
    }
    else {
        var perPageRegex = /perPage[=][0-9]+/;
        var results = perPageRegex.exec( currentURL );
        if( results != null )
        {
            currentURL = currentURL.replace(perPageRegex, "perPage=" + items);
            window.location.href = currentURL;
        }
        else notie.alert(3, "Not Found!", 2);
    }
}

function pageNo(x)
{
    if(currentURL.search('page=') == -1) {
        if(currentURL.search('[?]') == -1) {
            window.location = currentURL + "?page=" + x;
        }
        else {
            window.location = currentURL + "&page=" + x;
        }
    }
    else {
        var pageRegex = /page[=][0-9]+/;
        var results = pageRegex.exec( currentURL );
        if( results != null )
        {
            currentURL = currentURL.replace(pageRegex, "page=" + x);
            window.location.href = currentURL;
        }
        else notie.alert(3, "Not Found!", 2);
    }
}

function changeImage(picture, modalCount) {
    document.getElementById('product-image'+modalCount).src = 'images/products/'+picture;
}




