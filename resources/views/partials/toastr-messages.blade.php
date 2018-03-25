<script>
    @if(session('message'))
        toastr.{{session('message')['alert']}}("{{session('message')['text']}}");
        {{session()->forget('message')}}
    @endif
</script>