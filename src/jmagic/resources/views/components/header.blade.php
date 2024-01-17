<header id="main-header" role="banner">
   <h1 role="heading" aria-level="1">JMagic</h1>
   <a href="/login">Login</a>
   @auth
   <form action="/login" method="POST">
      @csrf
      <input type="hidden" name="_method" value="DELETE">
      <button type="submit" role="button">Logout</button>
   </form>
   @endauth
   <a href="/register">Register</a>
</header>
