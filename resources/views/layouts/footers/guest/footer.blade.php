  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        @if (!auth()->user() || \Request::is('static-sign-up'))
          <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
              <a href="https://www.instagram.com/quick.com.br?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="text-secondary me-xl-4 me-4">
                  <span class="text-lg fab fa-instagram" aria-hidden="true"></span>
              </a>
          </div>
        @endif
      </div>
      @if (!auth()->user() || \Request::is('static-sign-up'))
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Copyright © <script>
                document.write(new Date().getFullYear())
              </script> Criado por
              <a style="color: #252f40;" class="font-weight-bold ml-1" target="_blank">Intentoo team</a>
              &
              <a style="color: #252f40;" href="https://quick.com.br/" class="font-weight-bold ml-1" target="_blank">Quick</a>.
            </p>
          </div>
        </div>
      @endif
    </div>
  </footer>
