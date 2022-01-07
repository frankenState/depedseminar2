@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-4">Test API</h1>
            <div id="posts"></div>
            
        </div>
    </div>
</div>

<script>

    function fetchPost(){
        axios.get('http://127.0.0.1:8000/api/posts').then( e => {
            console.log(e.data);
            let posts = e.data;
            let html = "";
            posts.forEach(e => {
                html += `
                <div class="card mb-2">
                    <div class="card-body">
                        <h5>${e.title}</h5>
                        <p>${e.body}</p>
                        Posted by ${e.user.first_name} ${e.user.last_name}
                    </div>
                </div>
                `;
            });

            document.getElementById('posts').innerHTML = html;
        }).catch( error => {
            console.log("ERROR=> ", error);
        })
    }

    window.onload = () => {
        setInterval(() => {
            fetchPost();
        }, 2000);
    };

</script>
@endsection