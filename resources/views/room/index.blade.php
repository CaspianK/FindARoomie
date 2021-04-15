<!DOCTYPE html>
<html lang="en">
<x-head-meta :title="__('Home')">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</x-head-meta>
<body>
    <x-header></x-header>
    <div class="intro">
        <div class="container intro__container">
            <div class="intro__text text">
                <div class="intro__welcome">
                    <h1>{{__("Broke and lonely?")}}</h1>
                    <p>{{__("FindARoomie! is what will help you. Post your 'room' so that you can find someone to share it with! Or if you don't have one yet - find it with us! It's easy, you'll like it!")}}</p>
                </div>
                <div class="intro__buttons">
                    <a href="{{ url('/#find') }}" class="link text">{{__("Find a room")}}</a>
                    <a href="{{ route('room.create') }}" class="link text btn">{{__("Post a room")}}</a>
                </div>
            </div>
            <div><img src="{{ url('storage/images/home.png') }}" alt="" class="intro__picture"></div>
        </div>
    </div>
    <div class="main main_home">
        <div class="container main__container" id="find">
            <h2 class="text">{{__("See available rooms in :City", ['City' => session('city')])}}</h2>
            <div class="rooms" id="rooms">
                @include('room.display')
            </div>
            <div class="loader hide text">
                <img src="{{ url('storage/images/loader.gif') }}" alt="">
            </div>
            @if (sizeof($rooms) == 0)
                <div class="loader text">
                    No rooms yet in {{session('city')}}
                </div>
            @endif
        </div>
    </div>
    <x-footer></x-footer>
    <script type="text/javascript">
        function loadMore(page) {
            $.ajax({
                url: '?page=' + page,
                type: 'get',
                beforeSend: function() {
                     $('.loader').show();
                }

            }).done(function(data){
                if (data.html == '') {
                    $('.loader').html('No more rooms');
                    return;
                }
                $('.loader').hide()
                $('#rooms').append(data.html)
            }).fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('Server not responding');
            });
        }
        let page = 1;
        $(window).scroll(function(){
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMore(page);
            }
        })
    </script>
</body>
</html>