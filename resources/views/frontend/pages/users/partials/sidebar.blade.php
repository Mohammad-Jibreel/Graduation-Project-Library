<div class="profile-sidebar border">
  <div class="widget">
    <h5 class="pb-2 mb-1 mt-20">
      <i class="fa fa-user fa-lg" style="margin-left:40%;margin-top:15px"> </i>
    </h5>


    <div class="list-group mt-2">




        <a href="{{ route('users.dashboard', Auth::user()->username) }}" class="list-group-item list-group-item-action">
            Dashboard
          </a>

      <a href="{{ route('users.profile', Auth::user()->username) }}" class="list-group-item list-group-item-action">
        Profile
      </a>

      <a href="{{ route('users.dashboard.books') }}" class="list-group-item list-group-item-action">
        My Uploaded Books
      </a>

      <a href="{{route('wishlistShow')}}" class="list-group-item list-group-item-action">
        My Wishlist
      </a>

      <a href="{{route('Rating')}}" class="list-group-item list-group-item-action">
        Rating
      </a>


      <a href="{{route('chatify')}}" class="list-group-item list-group-item-action">
        Chat
      </a>
    </div>

  </div> <!-- Single Widget -->
</div>
