<!-- aditional stylesheets -->
        <!-- sticky notifications -->
            <link rel="stylesheet" href="{{asset('public/js/lib/sticky/sticky.css')}}"> 
<!-- sticky notifications -->
            <script src="{{asset('public/js/lib/sticky/sticky.min.js')}}"></script>           
<script type="text/javascript">
            function notified(){
            	@if( Session::has('success'))
                $.sticky("<b>Succès!</b> <br> <h5>{{Session::get('success')}}. </h5>", {autoclose : 10000, position: "top-right", type: "st-success" });
                @endif
                @if( Session::has('error'))
                $.sticky("<b>Erreur!</b> <br> <h5>{{Session::get('error')}}. </h5>", {autoclose : 10000, position: "top-right", type: "st-error" });
                @endif
                @if( Session::has('remarque'))
                $.sticky("<b>Attention!</b> <br> <h5>{{Session::get('remarque')}}. </h5>", {autoclose : 10000, position: "top-right", type: "st-info" });
                @endif
            }
</script>
