<footer class="footer footer-black footer-white text-primary {{$navbarClass}}">
    <div class="container">
        <div class="row">
            @auth
            <div class="credits ml-auto text-center">
                <span class="copyright">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, created by <i class="fa fa-heart heart"></i> <span class="text-primary">Arnulfo Acosta</span>
                </span>
            </div>
            @endauth
        </div>
    </div>
</footer>