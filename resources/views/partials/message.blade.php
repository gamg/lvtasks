@if(session('message'))
    <br><br>
    <div class="alert alert-{{session('message')['alert']}}">
        <strong>{{session('message')['text']}}</strong>
    </div>
@endif