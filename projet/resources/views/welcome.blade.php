@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Welcome to Vino App</h1>
                </div>
                <div class="card-body">
                    <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus illum nemo soluta quis tenetur atque explicabo tempore? Perferendis expedita impedit aperiam. Praesentium obcaecati fugit maiores molestias dolorem, quidem doloremque facilis sint at esse eligendi ipsam magnam atque eaque voluptates corporis, ex iusto suscipit ducimus odio, ab blanditiis. Provident nisi facere magnam ex nam aspernatur veniam iure non! Exercitationem voluptatibus assumenda dolor autem atque maxime ex, tenetur iste tempora aliquid, provident omnis? Repellat iure vitae dolorem et ad. Veniam ut ad earum fuga sunt voluptas, consequatur dolorum quaerat eum totam velit, incidunt sed! Fugiat qui provident vel illo ut accusantium, eaque, ea porro iste sunt ratione labore aperiam possimus officiis reprehenderit temporibus dignissimos nulla? Explicabo perspiciatis odio dolorem vero odit itaque blanditiis ipsum debitis reiciendis sapiente, laudantium aperiam tempora temporibus iste at amet deserunt alias perferendis officiis sequi! Maiores fugit rem quis quod fugiat. Cum cumque culpa eaque? Iste omnis mollitia magni officia maxime, a placeat necessitatibus vel repellat corrupti suscipit sit cupiditate alias nulla illo voluptate dolorum provident expedita, inventore accusamus quaerat deleniti quisquam nostrum animi. Assumenda ipsam cupiditate maxime quos molestiae minus dolor voluptatum. Voluptate neque expedita veniam quis ducimus repellat dolorem accusamus saepe, magnam labore consectetur illum earum.</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('bottle.index') }}" class="btn btn-primary">Go to Bottle List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection