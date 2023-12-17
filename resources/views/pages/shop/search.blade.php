@extends('pages.layouts.index')

@section('title')
<title>Search</title>
@stop
@section('content')
<!DOCTYPE html>
<html>
<head>
 <title>Full text search</title>
 
 <style type="text/css">
 .box{
   width:600px;
   margin:0 auto;
}
</style>
</head>
<body>
 <br />
 <div class="container box">
    <h3 align="center">Gợi ý tìm kiếm</h3><br />   
    <div class="form-group">
       <div class="header-search">
           <form method="POST" id="header-search">
           <input type="text" name="search" class="form-control m-input" placeholder="Nhập tên sản phẩm" />
           {{ csrf_field() }}
           </form>
       </div>
       <div id="search-suggest" class="s-suggest"></div>
   </div>
</div>
</div>
</body>
</html>


@stop
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$(".btn-show").click(function(){
			// var id = $(this).attr("data-id");
			var url = $(this).attr("data-url");
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'json',
				success: function(response) {
					console.log(response);
					$("#name-pr").text(response.name);
					$("#img-pr1").attr("data-thumb","{{url('../')}}/uploads/product/"+response.image);
					$("#img-pr2").attr("src","{{url('../')}}/uploads/product/"+response.image);
					$("#img-pr3").attr("href","{{url('../')}}/uploads/product/"+response.image);
					$("#price-pr").text(response.price+"VND");
					var sale_price= response.price-(response.sale_price*response.price/100);
					$("#price-pr-sale").text(sale_price+" VND");
					$("#description").text(response.description);
					$("#adcartmodal").attr("href","cart/add/"+response.id);	

				},
				error: function () {
				}
			})
			
		})
	})
   $('#header-search').on('keyup', function() {
       var search = $(this).serialize();
       if ($(this).find('.m-input').val() == '') {
           $('#search-suggest div').hide();
       } else {
           $.ajax({
               url: '/search',
               type: 'POST',
               data: search,
           })
           .done(function(res) {
               $('#search-suggest').html('');
               $('#search-suggest').append(res)
           })
       };
   });
</script>
@stop