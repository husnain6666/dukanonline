<div class="container">
    <div class="row clearfix">
        <div class="col-lg-3 col-xs-12">
            <div class="logo"> <a href="index.html" title="Flatro Template"><!-- <img alt="Flatro - Responsive Metro Inspired Flat ECommerce theme" src="images/logo2.png"> -->
                    <div class="logoimage"><i class="fa fa-shopping-cart fa-fw"></i></div>
                    <div class="logotext"><span><strong>FLATRO</strong></span><span>SHOP</span></div>
                    <span class="slogan">ONLINE STORE</span></a> </div>
        </div>
        <!-- end: logo -->
        <div class="visible-xs f-space20"></div>
        <!-- search -->
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right">
            <div class="searchbar">
                <form >
                    <ul class="pull-left">
                        <li class="input-prepend dropdown" data-select="true"> <a class="add-on dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <span class="dropdown-display">All
                Categories</span> <i class="fa fa-sort fa-fw"></i> </a>
                            <!-- this hidden field is used to contain the selected option from the dropdown-->
                            <input class="dropdown-field" type="hidden" id="select" value="All Categories" onchange="changeManufacturer();"/>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#a" data-value="Men Wear">Men Wear</a></li>
                                <li><a href="#a" data-value="Women Wear">Women Wear</a></li>
                                <li><a href="#a" data-value="Music">Music</a></li>
                                <li><a href="#a" data-value="Mobile Phones">Mobile Phones</a></li>
                                <li><a href="#a" data-value="Computers">Computers</a></li>
                                <li><a href="#a" data-value="Gaming">Gaming</a></li>
                                <li><a href="#a" data-value="Gift Ideas">Gift Ideas</a></li>
                                <li><a href="#a" data-value="All Categories">All Categories</a></li>
                            </ul>
                        </li>
                    </ul>

                    <div class="searchbox pull-left">
                        <input class="typeahead tt-query" onkeyup="handleKeyPress(event)" type="text" name="typeahead"  autocomplete="off" spellcheck="false" placeholder="Search..." id="searchid">
                    </div>

                </form>
            </div>
        </div>
        <!-- end: search -->
    </div>
</div>
<script>
    function handleKeyPress(e){
        var key=e.keyCode || e.which;
        if (key==13){
            changeManufacturer1();
        }
    }
    function changeManufacturer1() {

        var search = document.getElementById("searchid").value;
        url1 = 'category-grid.php?searchQuery=' + search;
        window.location.assign(url1);
    }
    function changeManufacturer() {

        var search = document.getElementById("select").value;
        url1 = 'category-grid.php?searchQuery=' + search;
        window.location.assign(url1);
    }

    $(document).ready(function(){
        $('input.typeahead').typeahead({
            name: 'typeahead',
            remote:'search.php?key=%QUERY',
            limit : 10
        });
    });
</script>
<script src="js/typeahead.min.js"></script>
