<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
</head>
<br/>
<!-- padding for jsfiddle -->
<div class="row">
    <div class="col-md-12">
         <h6>datetimepicker1</h6>

        <div class="form-group">
            <div class="input-group date" id="datetimepicker2">
                <input type="text" class="form-control" />  <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$('#datetimepicker2').datetimepicker({format : "YYYY/MM/DD hh:mm:ss"});
</script>