@extends(Auth::user() ? 'layouts.admin' : 'layouts.app')
    @section('content')
    <!-- <img src="https://i.redd.it/n4a5lspwp6d21.jpg" alt="" class="background__presentation"> -->
    <div class="clt__page">
        <div class="clt__membres">
            <div class="clt__membre clt__membre--1">
                <div class="clt__membre-info">    
                    <h3>Name</h3>
                    <span class="icon icon--facebook">Facebook</span>
                    <span class="icon icon--instagram">Instagram</span>
                </div>
            </div>
            <div class="clt__membre clt__membre--2">
                <div class="clt__membre-info">    
                    <h3>Name</h3>
                    <span class="icon icon--facebook">Facebook</span>
                    <span class="icon icon--instagram">Instagram</span>
                </div>
            </div>
            <div class="clt__membre clt__membre--3">
                <div class="clt__membre-info">    
                    <h3>Name</h3>
                    <span class="icon icon--facebook">Facebook</span>
                    <span class="icon icon--instagram">Instagram</span>
                </div>
            </div>
        </div>
        
        <div class="clt__description" style="color:white">
            <h2>CL Team</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus deleniti eos unde! Sequi, totam odio blanditiis minima quis ducimus iure sit eligendi at placeat ullam quam voluptatum repellendus reprehenderit exercitationem!
            Porro molestiae quisquam, assumenda fuga dignissimos minus iste, voluptas laudantium mollitia voluptate praesentium, sint tenetur obcaecati quasi iure minima similique deserunt distinctio. Nostrum velit labore eveniet sequi fuga, amet expedita.
            Quam perferendis earum doloremque amet? Deleniti consectetur reprehenderit quisquam, omnis veniam provident illum maxime suscipit, maiores ipsum eveniet eum earum quas corrupti vero? Libero quod quidem, accusantium repudiandae et porro.
            Incidunt amet commodi corporis fugiat nam porro ipsa harum vel doloribus laborum ut sunt quas eaque, dolor corrupti doloremque id, dolore placeat facere possimus pariatur? Labore eveniet adipisci quia explicabo.
            Dolorem sed fugiat a consectetur praesentium, eaque voluptatem quasi veritatis earum sapiente, voluptatum eum vel laborum cumque tempora delectus beatae! Perferendis quidem nihil impedit nobis adipisci corporis recusandae assumenda placeat.</p>
            <div class="clt__social-link">
                <a href="#"><span class="icon icon--facebook">Facebook</span></a>
                <a href="#"><span class="icon icon--instagram">Instagram</span></a>
                <a href="#"><span class="icon icon--youtube">Youtube</span></a>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
@parent

@endsection