<!-- <form>
    <input type="search" placeholder="Search">
</form> -->

<form action="" method="get" id="search" role="search">
	<input name="p" type="hidden" value="tim-kiem" />
	<input name="key" value="" id="txtSearch" class="txt_input" type="search" placeholder="Search">
</form>
<style>
	input[type=search] {
		-webkit-appearance: textfield;
		-webkit-box-sizing: content-box;
		font-family: inherit;
		font-size: 100%;
	}
	input::-webkit-search-decoration,
	input::-webkit-search-cancel-button {
		display: none; /* remove the search and cancel icon */
	}
	/* search input field */
	input[type=search] {
	    background: #ededed url(search-icon.png) no-repeat 9px center;
	    border: solid 1px #ccc;
	    padding: 9px 10px 9px 32px;
	    width: 20%;
	 
	    -webkit-border-radius: 10em;
	    -moz-border-radius: 10em;
	    border-radius: 10em;
	 
	    -webkit-transition: all .5s;
	    -moz-transition: all .5s;
	    transition: all .5s;
	}
	input[type=search]:focus {
	    width: 70%;
	    background-color: #fff;
	    border-color: #6dcff6;
	 
	    -webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
	    -moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
	    box-shadow: 0 0 5px rgba(109,207,246,.5);
	}
	/* placeholder */
	input:-moz-placeholder {
	    color: #999;
	}
	input::-webkit-input-placeholder {
	    color: #999;
	}
</style>

          